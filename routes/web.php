<?php

use App\Models\Office;
use App\Http\Middleware\isOffice;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\isCustomer;
use App\Http\Middleware\isCallCenter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Account\AuthController;
use App\Http\Controllers\Account\Office\CvController;
use App\Http\Controllers\Account\Auth\LoginController;
use App\Http\Controllers\Account\Dashboard\Customer\OrderController;
use App\Http\Controllers\Account\CallCenter\InquiryRequestController;

Route::middleware([SetLocale::class])->group(function () {

    Route::post('changeLocale', [MainController::class, 'changeLocale'])->name('changeLocale');

    Route::name('home.')->group(function () {
        Route::get('/', [MainController::class, 'home'])->name('index');
        Route::get('/contact', [MainController::class, 'contact'])->name('contact');
        Route::get('/blog', [MainController::class, 'blog'])->name('blog');
        Route::get('/blog/{blog}/details', [MainController::class, 'blogDetails'])->name('blog.details');
        Route::get('/about', [MainController::class, 'about'])->name('about');
        Route::get('workers', [MainController::class, 'workers'])->name('workers.index');
        Route::get('workers/{worker}', [MainController::class, 'workerDetails'])->name('workers.show');
    });

    Route::middleware('guest:account')->name('account.')->group(function () {
        Route::get('/login', [AuthController::class, 'authForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
        Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout.submit');
    });
    Route::middleware('auth:account')->name('account.')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::middleware(isOffice::class)->name('office.')->group(function () {
            Route::resource('cv', CvController::class)->only(['index', 'store']);
        });
        Route::middleware(isCustomer::class)->name('customer.')->group(function () {
            Route::post('order', [OrderController::class, 'placeOrder'])->name('orders.store');
        });
    });

    Route::prefix('user')->name('user.')->group(function () {
        require base_path('routes/user.php');
    });
    Route::middleware('auth:account')->prefix('account')->name('account.')->group(function () {
        require base_path('routes/account.php');
    });
});
