<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
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

        // Check if the user type is not one of 'coceo', 'activator', 'headadmin', or 'admin'
        if (!in_array($users->type, ['coceo', 'activator', 'headadmin', 'admin'])) {
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
        return view('member.dashboard', compact('users', 'pendingAccounts', 
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

        // Check if the user type is not one of 'coceo', 'activator', 'headadmin', or 'admin'
        if (!in_array($users->type, ['coceo', 'activator', 'headadmin', 'admin'])) {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all pending accounts with status "deactivate"
        $data = User::where('status', 'deactivate')->get();

        // Pass the information to the view
        return view('member.pending_account', ['users' => $users, 'data' => $data]);
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

    public function changePassword() {
        
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is not one of 'coceo', 'activator', 'headadmin', or 'admin'
        if (!in_array($users->type, ['coceo', 'activator', 'headadmin', 'admin'])) {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Pass the information to the view
        return view('member.change_password', ['users' => $users]);
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
    
        return redirect()->route('member.change_password')->with('success', 'Password changed successfully');
    }

    public function AllAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is not one of 'coceo', 'activator', 'headadmin', or 'admin'
        if (!in_array($users->type, ['coceo', 'activator', 'headadmin', 'admin'])) {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all accounts from CO-CEO to Player
        $data = User::whereIn('type', ['coceo', 'activator', 'headadmin', 'admin', 'player'])->get();

        // Pass the information to the view
        return view('member.all_account', ['users' => $users, 'data' => $data]);
    }


}
