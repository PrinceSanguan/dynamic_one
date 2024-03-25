<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // Check if user type is not null
            if (auth()->user()->type !== null) {
                // User is already logged in and type is not null, redirect to the appropriate dashboard
                switch (auth()->user()->type) {
                    case 'ceo':
                        return redirect()->route('ceo.dashboard');
                    case 'admin':
                    case 'coceo':
                    case 'activator':
                    case 'headadmin':
                        return redirect()->route('member.dashboard');
                    case 'player':
                        return redirect()->route('player.dashboard');
                    case 'programmer':
                        return redirect()->route('programmer.dashboard');
                    default:
                        // Redirect to login with error message if user type is unknown
                        return redirect()->route('auth.login')->with(['error' => 'Your account type is not determined. Please contact the CEO.']);
                }
            }
        }

        // User is not logged in, show the login form
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        // Authentication
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = Auth::user();
    
            // Check user status
            if ($user->status == 'active') {
                // Check user type
                if ($user->type == 'admin' || $user->type == 'coceo' || $user->type == 'activator' || $user->type == 'headadmin') {
                    // Redirect admin, coceo, headadmin or activator to member dashboard
                    return redirect()->route('member.dashboard');
                } elseif ($user->type == 'ceo') {
                    // Redirect CEO to their dashboard
                    return redirect()->route('ceo.dashboard');
                } elseif ($user->type == 'player') {
                    // Redirect player to their dashboard
                    return redirect()->route('player.dashboard');
                } elseif ($user->type == 'programmer') {
                    // Redirect programmer to their dashboard
                    return redirect()->route('programmer.dashboard');
                } elseif (is_null($user->type)) {
                    // Redirect to login with error message
                    return redirect()->route('auth.login')->with(['error' => 'Your account type is not determined. Please contact the CEO.']);
                }
            } else {
                // User is not activated, inform the user and log them out
                Auth::logout();
                return redirect()->route('auth.login')->with(['error' => 'Your account is not yet activated. Please wait for activation by our CEO Reynald Cayetano.']);
            }
        } else {
            // Authentication failed, redirect back with errors
            return redirect()->route('auth.login')->with(['error' => 'Invalid email or password']);
        }
    }

    public function welcome() {
        return view('welcome');
       }
}

