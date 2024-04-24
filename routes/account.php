<?php

use App\Http\Controllers\Account\Dashboard\Customer\InvoiceController;
use App\Http\Middleware\isOffice;
use App\Http\Middleware\isCustomer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\Office\CvController;
use App\Http\Controllers\Account\Dashboard\SecurityController;
use App\Http\Controllers\Account\Dashboard\SettingsController;
use App\Http\Controllers\Account\Dashboard\Customer\OrderController;
use App\Http\Controllers\Account\Dashboard\Office\MainController as OfficeMainController;
use App\Http\Controllers\Account\Dashboard\Customer\MainController as CustomerMainController;

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::prefix('customer')->middleware('auth:account',isCustomer::class)->name('customer.')->group(function () {
        Route::get('', [CustomerMainController::class, 'dashboard'])->name('index');
        Route::resource('orders', OrderController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::put('orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel');
    });
    Route::prefix('office')->middleware(isOffice::class)->name('office.')->group(function () {
        Route::get('', [OfficeMainController::class, 'dashboard'])->name('index');
        Route::resource('cvs', CvController::class);
        Route::put('orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel');
    });

    Route::name('settings.')->prefix('settings')->group(function () {
        Route::get('', [SettingsController::class, 'showSettings'])->name('index');
        Route::put('update', [SettingsController::class, 'updateSettings'])->name('update');
    });
    Route::prefix('security')->name('security.')->group(function () {
        Route::get('', [SecurityController::class, 'showSecurity'])->name('index');
        Route::put('update', [SecurityController::class, 'updateSecurity'])->name('update');
    });
});
