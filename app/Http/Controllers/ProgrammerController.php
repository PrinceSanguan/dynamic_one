<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProgrammerController extends Controller
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

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
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

        // Get the total number of points
        $totalPoints = User::sum('point');

        // Pass the information to the view
        return view('programmer.dashboard', compact('users', 'pendingAccounts', 
                'totalPlayerAccounts', 'totalCoceoAccounts', 'totalActivatorAccounts', 
                'totalHeadadminAccounts', 'totalAdminAccounts', 'totalPoints'));
    }

    public function PendingAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all Pending Account and the Null Type
        $data = User::where(function ($query) {
            $query->where('status', 'deactivate')
                ->orWhereNull('type');
        })->get();

        // Pass the information to the view
        return view('programmer.pending_account', ['users' => $users, 'data' => $data]);
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

    public function AllAccount()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all accounts from CEO to Player
        $data = User::whereIn('type', ['ceo', 'coceo', 'activator', 'headadmin', 'admin', 'player'])->get();

        // Pass the information to the view
        return view('programmer.all_account', ['users' => $users, 'data' => $data]);
    }

    public function PlayerLevel()
    {
        $users = $this->getUserInfo();

        // Check if the user is found
        if (!$users) {
            return redirect()->route('auth.login')->withErrors(['error' => 'User not found.']);
        }

        // Check if the user type is 'programmer'
        if ($users->type !== 'programmer') {
            // Redirect to the same page with an error message
            return redirect()->route('auth.login')->withErrors(['error' => 'Access denied.']);
        }

        // Fetch all player accounts with an active status
        $data = User::where('type', 'player')
        ->where('status', 'active')
        ->get();

        // Pass the information to the view
        return view('programmer.player_level', ['users' => $users, 'data' => $data]);
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
