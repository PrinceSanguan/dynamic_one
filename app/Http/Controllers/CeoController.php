<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class CeoController extends Controller
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

        // Check if the user type is 'ceo'
        if ($users->type !== 'ceo') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Get the total number of pending account
        $pendingAccounts = User::where('status', 'deactivate')->count();

        // Get the total number of player
        $totalPlayerAccounts = User::where('type', 'player')->count();

        // Get the total number of Co CEO
        $totalCoceoAccounts = User::where('type', 'coceo')->count();

        // Get the total number of Activator
        $totalActivatorAccounts = User::where('type', 'activator')->count();

        // Get the total number of Head Admin
        $totalHeadadminAccounts = User::where('type', 'headadmin')->count();

        // Get the total number of Admin
        $totalAdminAccounts = User::where('type', 'admin')->count();

        // Pass the information to the view
        return view('ceo.dashboard', compact('users', 'pendingAccounts', 
                'totalPlayerAccounts', 'totalCoceoAccounts', 'totalActivatorAccounts', 
                'totalHeadadminAccounts', 'totalAdminAccounts'));
    }

    public function PendingAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'ceo'
        if ($users->type !== 'ceo') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all Pending Account and the Null Type
        $data = User::where(function ($query) {
            $query->where('status', 'deactivate')
                ->orWhereNull('type');
        })->get();

        // Pass the information to the view
        return view('ceo.pending_account', ['users' => $users, 'data' => $data]);
    }

    public function updateUserStatus(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Check if the request has a 'type' field and update user type if it exists
        if ($request->has('type')) {
            $user->type = $request->input('type');
        }
    
        // Toggle the status (active to deactivate or deactivate to active)
        $user->status = $user->status == 'active' ? 'deactivate' : 'active';
    
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User status updated successfully');
    }

    public function updateUserLevel(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);
    
        // Check if the request has a 'level' field and update user type if it exists
        if ($request->has('level')) {
            $user->level = $request->input('level');
        }
    
        $user->save();
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'User level updated successfully');
    }

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user's type is "CEO"
        if ($users->type !== 'ceo') {
            // Redirect to the previous page or any specific page you want
            return redirect()->back()->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('ceo.change_password', ['users' => $users]);
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
    
        return redirect()->route('ceo.change_password')->with('success', 'Password changed successfully');
    }

    public function AllAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'ceo'
        if ($users->type !== 'ceo') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all accounts from CO-CEO to Player
        $data = User::whereIn('type', ['coceo', 'activator', 'headadmin', 'admin', 'player'])->get();

        // Pass the information to the view
        return view('ceo.all_account', ['users' => $users, 'data' => $data]);
    }

    public function PlayerLevel()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'ceo'
        if ($users->type !== 'ceo') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all player accounts with an active status
        $data = User::where('type', 'player')
        ->where('status', 'active')
        ->get();

        // Pass the information to the view
        return view('ceo.player_level', ['users' => $users, 'data' => $data]);
    }

    public function DeleteAccount($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Delete the user
        $user->delete();

        // Redirect back with success message (optional)
        return redirect()->back()->with('success', 'Account deleted successfully');
    }


}