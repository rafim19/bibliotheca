<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'authCheck']);

Route::middleware(['isLoggedOut'])->group(function() {
    Route::get('/login', function() {
        return view('index');
    })->name('login');

    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware(['isLoggedIn'])->group(function() {
    Route::get('/home/{categoryId?}', [HomeController::class, 'showByCategory'])->name('showByCategory');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/borrow', [BookController::class, 'borrow']);
});

