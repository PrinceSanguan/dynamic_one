<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/about-our-ceo', function () {
    return view('about-our-ceo');
});

Route::get('/member', function () {
    return view('member');
});

Route::get('/why-choose-us', function () {
    return view('why-choose-us');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/auth/signin/{referral_id?}', [SigninController::class, 'index'])->name('signin');
Route::post('/auth/signin', [SigninController::class, 'signinForm'])->name('signin.form');
