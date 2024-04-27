<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Dashboard\Account\Settings\SiteSettingsController;
use App\Http\Controllers\User\Dashboard\CvController;
use App\Http\Controllers\User\Dashboard\BlogController;
use App\Http\Controllers\User\Dashboard\BondController;
use App\Http\Controllers\User\Dashboard\MainController;
use App\Http\Controllers\User\Dashboard\OrderController;
use App\Http\Controllers\User\Dashboard\OfficeController;
use App\Http\Controllers\User\Dashboard\WorkerController;
use App\Http\Controllers\User\Dashboard\AccountController;
use App\Http\Controllers\User\Dashboard\InvoiceController;
use App\Http\Controllers\User\Dashboard\ReportsController;
use App\Http\Controllers\User\Dashboard\ContractController;
use App\Http\Controllers\User\Dashboard\CustomerController;
use App\Http\Controllers\User\Dashboard\DiscountController;
use App\Http\Controllers\User\Dashboard\SecurityController;
use App\Http\Controllers\User\Dashboard\SettingsController;
use App\Http\Controllers\User\Dashboard\TransactionController;
use App\Http\Controllers\User\Dashboard\IndebtednessController;
use App\Http\Controllers\User\Dashboard\Settings\CountryController;
use App\Http\Controllers\User\Dashboard\UserController;
use App\Http\Middleware\AuthenticatedToDashboard;
use App\Http\Middleware\IsAdmin;

Route::middleware(AuthenticatedToDashboard::class)->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
});
Route::middleware(IsAdmin::class)->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout.submit');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('', [MainController::class, 'dashboard'])->name('index');
        Route::resource('cvs', CvController::class);
        Route::resource('offices', OfficeController::class);
        Route::resource('workers', WorkerController::class);
        Route::resource('customers', CustomerController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('accounts', AccountController::class);
        Route::resource('users', UserController::class);

        Route::put('offices/{office}/password/update', [OfficeController::class, 'updatePassword'])->name('offices.update.password');
        Route::put('callCenters/{callCenter}/password/update', [CustomerController::class, 'updatePassword'])->name('callCenters.update.password');
        Route::get('/security', [SecurityController::class, 'showSecurity'])->name('security');

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('', [SettingsController::class, 'showSettings'])->name('index');
            Route::get('genral', [SettingsController::class, 'genral'])->name('genral');
            Route::resource('countries', CountryController::class);
            Route::prefix('siteSettings')->name('siteSettings.')->group(function () {
                Route::get('', [SiteSettingsController::class, 'index'])->name('index');
                Route::put('update', [SiteSettingsController::class, 'update'])->name('update');
                Route::get('topBar', [SiteSettingsController::class, 'topBar'])->name('topBar');
            });
        });

        Route::put('/settings/update', [SettingsController::class, 'updateSettings'])->name('settings.update');
        Route::put('/security/update', [SecurityController::class, 'updateSecurity'])->name('security.update');
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::get('', [ReportsController::class, 'index'])->name('index');
            Route::resource('orders', OrderController::class);
            Route::resource('transactions', TransactionController::class);
            Route::resource('bonds', BondController::class);
            Route::resource('contracts', ContractController::class);
            Route::resource('discounts', DiscountController::class);
            Route::resource('invoices', InvoiceController::class);
            Route::resource('indebtedness', IndebtednessController::class);
        });
    });
});
