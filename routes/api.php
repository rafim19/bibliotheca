<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['api'])->group(function() {
// });
Route::get('/borrow/{bookId}/{userId}', [BookController::class, 'borrow']);
Route::get('/read-notif/{id}', [NotificationController::class, 'read']);
// Route::middleware('isLoggedIn')->group(function() {
// });