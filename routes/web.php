<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlayerController;

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

Route::get('/', [LoginController::class, 'welcome'])->name('welcome');

Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/auth/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/auth/signin/{referral_id?}', [SigninController::class, 'index'])->name('signin');
Route::post('/auth/signin', [SigninController::class, 'signinForm'])->name('signin.form');

Route::middleware(['auth'])->group(function () {

    /********************************************This Route is For Player!! *****************************/

    Route::get('player/dashboard', [PlayerController::class, 'index'])->name('player.dashboard');

    //Route for Solving Captcha
    Route::get('player/solve_captcha', [PlayerController::class, 'SolveCaptcha'])->name('player.solve_captcha');
    Route::post('player/solve_captcha', [PlayerController::class, 'UpdateUserPoints'])->name('player.update_points');

    //Route for Success and error
    Route::get('player/error', [PlayerController::class, 'error'])->name('error');
    Route::get('player/success', [PlayerController::class, 'success'])->name('success');    

    //Route for change Password
    Route::get('player/change_password', [PlayerController::class, 'ChangePassword'])->name('player.change_password');
    Route::post('player/change_password', [PlayerController::class, 'ChangePasswordRequest'])->name('player.change_password_request');

    /********************************************This Route is For Player!! *****************************/

    /********************************************This Route is For Members!! *****************************/
    Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');
    Route::get('/member/pending_account', [MemberController::class, 'PendingAccount'])->name('member.pending_account');
    Route::get('/member/all_account', [MemberController::class, 'AllAccount'])->name('member.all_account');
    Route::get('member/player_level', [MemberController::class, 'PlayerLevel'])->name('member.player_level');

    // For withdrawal
    Route::get('player/withdraw', [PlayerController::class, 'withdraw'])->name('withdraw');
    Route::post('player/withdraw', [PlayerController::class, 'withdrawPoints'])->name('withdraw.points');

    // Route for deleting a player
    Route::get('/member/delete_account/{id}', [MemberController::class, 'DeleteAccount'])->name('member.delete_account');

    //Route for activate
    Route::patch('/member/update-user-status/{id}', [MemberController::class, 'updateUserStatus'])->name('member.update_status');

    //Route for Player Level
    Route::patch('/member/update-level-status/{id}', [MemberController::class, 'updateUserLevel'])->name('member.update_level');

    //Route for change Password
    Route::get('member/change_password', [MemberController::class, 'ChangePassword'])->name('member.change_password');
    Route::post('member/change_password', [MemberController::class, 'ChangePasswordRequest'])->name('member.change_password_request');
    /********************************************This Route is Members!! *****************************/

    /********************************************This Route is For CEO!! *****************************/
    Route::get('/ceo/dashboard', [CeoController::class, 'index'])->name('ceo.dashboard');
    Route::get('/ceo/pending_account', [CeoController::class, 'PendingAccount'])->name('ceo.pending_account');
    Route::get('/ceo/all_account', [CeoController::class, 'AllAccount'])->name('ceo.all_account');
    Route::get('/ceo/player_level', [CeoController::class, 'PlayerLevel'])->name('ceo.player_level');

    // Route for deleting a player
    Route::get('/ceo/delete_account/{id}', [CeoController::class, 'DeleteAccount'])->name('ceo.delete_account');

    //Route for activate
    Route::patch('/ceo/update-user-status/{id}', [CeoController::class, 'updateUserStatus'])->name('ceo.update_status');

    //Route for Player Level
    Route::patch('/ceo/update-level-status/{id}', [CeoController::class, 'updateUserLevel'])->name('ceo.update_level');

    //Route for change Password
    Route::get('ceo/change_password', [CeoController::class, 'ChangePassword'])->name('ceo.change_password');
    Route::post('ceo/change_password', [CeoController::class, 'ChangePasswordRequest'])->name('ceo.change_password_request');
    /********************************************This Route is CEO!! *****************************/

    /********************************************This Route is For Programmer!! *****************************/
    Route::get('/programmer/dashboard', [ProgrammerController::class, 'index'])->name('programmer.dashboard');
    Route::get('/programmer/pending_account', [ProgrammerController::class, 'PendingAccount'])->name('programmer.pending_account');
    Route::get('/programmer/all_account', [ProgrammerController::class, 'AllAccount'])->name('programmer.all_account');
    Route::get('/programmer/player_level', [ProgrammerController::class, 'PlayerLevel'])->name('programmer.player_level');

    // Route for deleting a player
    Route::get('/programmer/delete_account/{id}', [ProgrammerController::class, 'DeleteAccount'])->name('programmer.delete_account');

    //Route for activate
    Route::patch('/programmer/update-user-status/{id}', [ProgrammerController::class, 'updateUserStatus'])->name('programmer.update_status');

    //Route for Player Level
    Route::patch('/programmer/update-level-status/{id}', [ProgrammerController::class, 'updateUserLevel'])->name('programmer.update_level');
    /********************************************This Route is For Programmer!! *****************************/

    /******************************************** This Route is For Logout *****************************/
    Route::get('/logout', function (Request $request) {
        Session::flush();
        Auth::logout();
    
        return redirect()->route('welcome');
    })->name('logout');
    /******************************************** This Route is For Logout *****************************/   
    });

