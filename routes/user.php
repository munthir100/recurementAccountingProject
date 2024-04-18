<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Dashboard\CvController;
use App\Http\Controllers\User\Dashboard\BlogController;
use App\Http\Controllers\User\Dashboard\MainController;
use App\Http\Controllers\User\Dashboard\OfficeController;
use App\Http\Controllers\User\Dashboard\WorkerController;
use App\Http\Controllers\User\Dashboard\CustomerController;
use App\Http\Controllers\User\Dashboard\SecurityController;
use App\Http\Controllers\User\Dashboard\SettingsController;


Route::middleware('guest:web')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
});
Route::middleware('auth:web')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [MainController::class, 'dashboard'])->name('index');
        Route::resource('cvs', CvController::class);
        Route::resource('offices', OfficeController::class);
        Route::resource('workers', WorkerController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('blogs', BlogController::class);
        Route::put('offices/{office}/password/update', [OfficeController::class, 'updatePassword'])->name('offices.update.password');
        Route::put('callCenters/{callCenter}/password/update', [CustomerController::class, 'updatePassword'])->name('callCenters.update.password');


        Route::get('settings', [SettingsController::class, 'showSettings'])->name('settings');
        Route::get('/security', [SecurityController::class, 'showSecurity'])->name('security');
        Route::put('/settings/update', [SettingsController::class, 'updateSettings'])->name('settings.update');
        Route::put('/security/update', [SecurityController::class, 'updateSecurity'])->name('security.update');
    });
});
