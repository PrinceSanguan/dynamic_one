<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function index()
    {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // User is already logged in, redirect to the dashboard or another page
            return redirect()->route('dashboard');
        }

        // Get the referral code from the URL query parameter
        $referralCode = request('ref');

        // This is referral example = http://127.0.0.1:8000/signin?ref=1

        // Pass the referral code to the view
        return view('auth.signin', ['referralCode' => $referralCode]);
    }
}
