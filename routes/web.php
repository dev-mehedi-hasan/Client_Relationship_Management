<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\Profile\ProfileController;
use App\Http\Controllers\Backend\UserRegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Basic Routing
// Route::get('/', function () {
//     return view('index');
// });

//Auth Routing
Auth::routes();

//Common Routing
Route::get('/home', [HomeController::class, 'index'])->name('home');

// User SignUp Route
Route::post('auth', [UserRegisterController::class, 'registerAuth'])->name('auth.store');

// Facebook Social Route
Route::get('login/{provider}', [LoginController::class, 'facebookRedirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'facebookHandleProviderCallback']);

// Google Social Route
Route::get('login/{provider}', [LoginController::class, 'googleRedirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class,'googleHandleProviderCallback']);

// Profile 
Route::group(['middleware'=>'auth'], function(){
    Route::get('profile', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::put('profile/update/{id}', [ProfileController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('profile/security', [ProfileController::class, 'changePassword'])->name('user.profile.security');
    Route::put('password/update', [ProfileController::class, 'passwordUpdate'])->name('user.password.update');
});

















