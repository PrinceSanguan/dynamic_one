<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


class PlayerController extends Controller
{
    private function getUserInfo()
    {
        // Get the currently authenticated user
        $authenticatedUser = Auth::user();

        // Check if the authenticated user exists
        if (!$authenticatedUser) {
            return null;
        }

        // Fetch user information based on the authenticated user's username
        return User::where('username', $authenticatedUser->username)->first();
    }

    public function index()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        $totalPoints = $users->point;

        // Pass the information to the view
        return view('player.dashboard', ['users' => $users, 'totalPoints' => $totalPoints]);
    }

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('player.change_password', ['users' => $users]);
    }

    public function ChangePasswordRequest(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'confirm_password' => 'required|same:new_password',
        ]);
    
        $user = auth()->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages(['current_password' => 'Incorrect current password']);
        }
    
        $user->update(['password' => Hash::make($request->new_password)]);
    
        return redirect()->route('player.change_password')->with('success', 'Password changed successfully');
    }

        public function solveCaptcha()
        {
            $users = $this->getUserInfo();

            // Check if the user is found
            if (!$users) {
                return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
            }

            // Check if the user's type is "player"
            if ($users->type !== 'player') {
                // Redirect to the previous page or any specific page you want
                return redirect()->back()->withErrors(['error' => 'Access denied.']);
            }

            // Pass the information to the view
            return view('player.solve_captcha', ['users' => $users]);
        }

        public function UpdateUserPoints(Request $request)
        {
            $lastAttemptTime = Session::get('last_captcha_attempt', 0);
            $userLevel = auth()->user()->level;
        
            // Check if the user is trying to bypass the waiting period
            if (time() - $lastAttemptTime < 10) {
                $error = "Please wait 10 seconds before attempting another Captcha.";
                return redirect()->route('error')->with('error', $error);
            }
        
            $validator = Validator::make($request->all(), [
                'captcha' => 'required|captcha',
            ]);
        
            // Check if the user level is neither "starter" nor "premium"
            if ($userLevel != "starter" && $userLevel != "premium") {
                $error = "You need to upgrade your account in order to answer and earn points.";
                return redirect()->route('error')->with('error', $error);
            }
        
            // Assuming you have a user authenticated
            $user = auth()->user();
        
            if ($validator->fails()) {
                $error = "You have entered an invalid Captcha.";
                Session::put('last_captcha_attempt', time()); // Update last attempt time
                return redirect()->route('error')->with('error', $error);
            }
        
            // Update user points for a correct Captcha based on user's level
            $pointsEarned = ($user->level === 'starter') ? 0.02 : (($user->level === 'premium') ? 0.01 : 0);
            $user->point += $pointsEarned;
            $user->save();
        
            $success = "You have entered the correct Captcha. You earned $pointsEarned Peso.";
            Session::put('last_captcha_attempt', time()); // Update last attempt time
        
            // Add a 10 seconds countdown before redirecting back to the dashboard
            Session::put('countdown', 10);
            Session::put('redirect_url', URL::route('player.solve_captcha'));
        
            return redirect()->route('success')->with('success', $success);
        }        

    public function withdraw()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "player"
        if ($users->type !== 'player') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        $totalPoints = $users->point;

        // Pass the information to the view
        return view('player.withdraw', ['users' => $users, 'totalPoints' => $totalPoints]);
    }

    public function withdrawPoints(Request $request) 
    {
        // Get the user information
        $user = $this->getUserInfo();
    
        // Check if the user is found
        if (!$user) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }
    
        // Check if the user type is 'player'
        if ($user->type !== 'player') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }
    
        // Validate the withdrawal amount
        $request->validate([
            'point' => 'required|numeric|integer',
        ]);
    
        // Define valid withdrawal amounts based on user's level
        $validWithdrawals = [];
        if ($user->level === 'starter') {
            $validWithdrawals = [50, 70, 150];
        } elseif ($user->level === 'premium') {
            $validWithdrawals = [150, 5000, 10000];
        } else {
            return redirect()->back()->with('error', 'Invalid user level.');
        }
    
        // Check if the withdrawal amount is valid
        if (!in_array($request->input('point'), $validWithdrawals)) {
            return redirect()->back()->with('error', 'Invalid withdrawal amount. Please choose a valid amount based on your account type.');
        }
    
        // Get the points from the request
        $withdrawalAmount = $request->input('point');
    
        // Check if the deduction would result in a negative value
        if ($user->point - $withdrawalAmount < 0) {
            return redirect()->back()->with('error', 'The withdrawal amount exceeds your current points. Make a valid withdrawal.');
        }
    
        // Deduct points from the player
        $user->update([
            'point' => $user->point - $withdrawalAmount,
        ]);
    
        $formattedDate = now()->format('F j, Y g:ia');
    
        // Create a transaction record
        Transactions::create([
            'user_id' => $user->id,
            'amount' => $withdrawalAmount,
            'type' => 'withdrawal',
        ]); 
    
        // Redirect with success message
        return redirect()->route('success')->with('success', "Success! You withdrew {$withdrawalAmount} Pesos on {$formattedDate}. Thank you!");
    }
    

    public function success()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('player.success', ['users' => $users]);
    }

    public function error()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Pass the information to the view
        return view('player.error', ['users' => $users]);
    }

}


