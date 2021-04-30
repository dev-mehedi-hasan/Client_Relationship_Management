<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Backend\Client\ContactController;
use App\Http\Controllers\Backend\Client\InvoiceController;
use App\Http\Controllers\Backend\Client\ClientOrderController;
use App\Http\Controllers\Backend\Client\ClientAccountController;
use App\Http\Controllers\Backend\Client\ClientProfileController;
use App\Http\Controllers\Backend\Client\ClientOrderFeedbackController;
use App\Http\Controllers\Backend\Client\ClientSpecificationController;
use App\Http\Controllers\Backend\Client\ClientSpecificationStepbystepController;
use App\Http\Controllers\Backend\Client\ClientSpecificationMarketplaceController;
use App\Http\Controllers\Backend\client\FreeTrailController;

Route::get('dashboard', [ClientController::class,'dashboard'])->name('dashboard');
// Order Route
Route::resource('order', ClientOrderController::class);
// Specification Route
Route::resource('specification', ClientSpecificationController::class);
// Specification Step by Step Route
Route::resource('specification-stepbystep', ClientSpecificationStepbystepController::class);
// Specification Marketplace Route
Route::resource('specification-marketplace', ClientSpecificationMarketplaceController::class);
// Client Account Controller
Route::resource('account', ClientAccountController::class);
// Client Order Feedback 
Route::get('feedback', [ClientOrderFeedbackController::class, 'dashboard'])->name('order.feedback');
Route::get('feedback/{id}', [ClientOrderFeedbackController::class, 'orderFeedback'])->name('order.wise.feedback');
Route::post('order/feedback/store/{id}', [ClientOrderFeedbackController::class, 'feedbackStore'])->name('order.feedback.store');
Route::resource('contacts-us', ContactController::class);
// Invoice
Route::get('invoice/{id}', [InvoiceController::class, 'InvoiceIndex'])->name('invoice.byid.index');
Route::get('invoice/print/{id}', [InvoiceController::class, 'InvoicePrint'])->name('invoice.print');
// Delivery image download 
Route::get('delivery/image/download/{id}', [ClientOrderController::class, 'deliveryImageDownload'])->name('order.image.download');
// Free Trail 
Route::get('free-trail', [FreeTrailController::class, 'index'])->name('freetrail.index');
Route::get('free-trail/create', [FreeTrailController::class, 'create'])->name('freetrail.create');
Route::post('free-trail/store', [FreeTrailController::class, 'store'])->name('freetrail.store');