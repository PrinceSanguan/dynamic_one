<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SigninController extends Controller
{
    public function index()
    {
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

        // Get the referral code from the URL query parameter
        $referralCode = request('ref');

        // This is referral example = http://127.0.0.1:8000/signin?ref=1

        // Pass the referral code to the view
        return view('auth.signin', ['referralCode' => $referralCode]);
    }

    public function signinForm(Request $request)
    {
        // Validate the request data with custom error messages
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email',
            'work' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,}$/',
            ],
            'number' => 'required|numeric|digits:11',
            'referral_id' => 'nullable|exists:users,id', // if register the programmer make change of required to nullable
        ], [
            'password.regex' => 'The password must contain at least one letter, one number, and be at least 6 characters long.',
            'referral_id.exists' => 'The referral code is not valid.',
        ]);
    
        // Saving in the database
        $user = User::create([
            'username' => $request->input('username'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'work' => $request->input('work'),
            'address' => $request->input('address'),
            'gender' => $request->input('gender'),
            'number' => $request->input('number'),
            'password' => bcrypt($request->input('password')),
            'referral_id' => $request->input('referral_id'),
        ]);
    
        if (!$user) {
            return redirect()->route('signin')->with('error', 'Failed to create user.');
        }
    
        // Redirect with success message
        return redirect()->route('auth.login')->with('success', 'You have successfully signed in! Wait for the Approval of the CEO Reynald Cayetano to activate your account.');
    }
}
