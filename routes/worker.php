<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Worker\WorkerController;
use App\Http\Controllers\Backend\Worker\InvoiceController;
use App\Http\Controllers\Backend\Worker\ReviewController;
use App\Http\Controllers\Backend\Worker\WorkerOrderController;

Route::get('dashboard', [WorkerController::class, 'dashboard'])->name('dashboard');
// Worker Order Route
Route::resource('order', WorkerOrderController::class);
Route::get('order/take-it/{id}', [WorkerController::class, 'orderTakeIt'])->name('order.take.it');
// Route::resource('account','WorkerAccountController');
Route::get('order/details/{id}',  [WorkerOrderController::class, 'orderDetails'])->name('order.details');
// Image Download All
Route::get('order/image/download/{id}', [WorkerOrderController::class, 'imageDownload'])->name('order.image.download');
Route::post('order/delivery/{id}', [WorkerOrderController::class, 'deliveryImage'])->name('order.delivery.image');
// Order Invoice Route
Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('invoice/print/{id}', [InvoiceController::class, 'invoicePrint'])->name('invoice.print');
// Client Review 
Route::get('review/order/{id}', [ReviewController::class, 'clientReview'])->name('review.order');