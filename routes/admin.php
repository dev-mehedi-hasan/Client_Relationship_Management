<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\AdminOrderController;
use App\Http\Controllers\Backend\Admin\AdminProfileController;
use App\Http\Controllers\Backend\Admin\AdminFreeTrialController;
use App\Http\Controllers\Backend\Admin\AdminRecordWorkerController;
use App\Http\Controllers\Backend\Admin\AdminRecordBillingController;
use App\Http\Controllers\Backend\Admin\AdminSpecificationController;
use App\Http\Controllers\Backend\Admin\SpecificationCreateController;

//Admin Dashboard Route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// User Route
Route::resource('users', UserController::class);
// Order Route
Route::resource('order', AdminOrderController::class);
// Free Trials Route
Route::resource('freetrials', AdminFreeTrialController::class);
// Specification Route
Route::resource('specification', AdminSpecificationController::class);
Route::resource('specifications', SpecificationCreateController::class);
// User Record Route
Route::resource('record/billing', AdminRecordBillingController::class);
// Route::resource('record/client','AdminRecordClientController');
Route::resource('record/worker', AdminRecordWorkerController::class);
// User Control Route
Route::get('users/deactived/{id}', [UserController::class, 'deactivedUser'])->name('user.deactived');
Route::get('users/actived/{id}', [UserController::class, 'activedUser'])->name('user.actived');
// Specification Search 
Route::post('specification', [AdminSpecificationController::class, 'search'])->name('specification.search');

