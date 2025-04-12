<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminEggController;
use App\Http\Controllers\Admin\AdminGeckoController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Web\NewsController;
use App\Http\Controllers\Web\IppnuController;
use App\Http\Controllers\Web\IpnuController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;

// Route for user view
Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'splash'])->name('splash');
    Route::get('/welcome-animation', [HomeController::class, 'welcome'])->name('welcome-animation');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('ipnu', [IpnuController::class, 'index'])->name('ipnu');
    Route::get('ipnu/search', [IpnuController::class, 'search'])->name('ipnu.search');
    Route::get('ippnu', [IppnuController::class, 'index'])->name('ippnu');
    Route::get('ippnu/search', [IppnuController::class, 'search'])->name('ippnu.search');
    Route::get('news', [NewsController::class, 'index'])->name('news');
    Route::get('news-details/{id}', [NewsController::class, 'show'])->name('news-details');
    Route::get('news/search', [NewsController::class, 'search'])->name('news.search');
});

// Route for authentication

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('forgot-password', [UserController::class, 'updatePassword']);
Route::post('logout', [UserController::class, 'destroy'])->name('logout');


// Route with middleware for admin
Route::prefix('dashboard')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('dashboard');
    Route::get('/search', [AdminIndexController::class, 'search'])->name('search');
    Route::resource('ipnu', AdminGeckoController::class);
    Route::get('/ipnu-export', [AdminGeckoController::class, 'export'])->name('gecko.export');
    Route::resource('ippnu', AdminEggController::class);
    Route::get('/ippnu-export', [AdminEggController::class, 'export'])->name('egg.export');
    Route::resource('news', AdminNewsController::class);
    Route::get('/news-export', [AdminNewsController::class, 'export'])->name('news.export');
    Route::get('profile', [AdminUserController::class, 'index'])->name('profile');
    Route::post('profile', [AdminUserController::class, 'update'])->name('profile.update');
});

// Route for route not found
Route::fallback(function () {
    return response()->view('errors.error-404', [], 404);
});
