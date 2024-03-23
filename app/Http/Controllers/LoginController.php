<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        // Check if the user is already authenticated
        if (auth()->check()) {
            // User is already logged in, redirect to the dashboard or another page
            return redirect()->route('dashboard');
        }

        // User is not logged in, show the login form
        return view('auth.login');
    }
}
