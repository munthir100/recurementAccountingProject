<?php

use App\Models\Customer;
use App\Http\Middleware\isCustomer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\Dashboard\MainController;
use App\Http\Controllers\Account\Dashboard\SecurityController;
use App\Http\Controllers\Account\Dashboard\SettingsController;
use App\Http\Controllers\Account\Dashboard\Customer\OrderController;


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('', [MainController::class, 'dashboard'])->name('index');
    // route middleware isCustomer name customer.
    Route::middleware(isCustomer::class)->name('customer.')->group(function () {
        Route::resource('orders', OrderController::class);
        //cancel order
        Route::put('orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel');

    });
    Route::name('settings.')->prefix('settings')->group(function(){
        Route::get('', [SettingsController::class, 'showSettings'])->name('index');
        Route::put('update', [SettingsController::class, 'updateSettings'])->name('update');
    });
    Route::prefix('security')->name('security.')->group(function(){
        Route::get('', [SecurityController::class, 'showSecurity'])->name('index');
        Route::put('update', [SecurityController::class, 'updateSecurity'])->name('update');
    });
});
