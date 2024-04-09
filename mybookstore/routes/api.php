<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function() {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

// Global Authentication for API routes
Route::middleware('auth:sanctum')->group(function() {

    Route::get('/user', function(Request $request) {
       return $request->user();
    });

    // Admin-only routes
    Route::middleware('CheckRole:admin')->group(function() {
        // Routes accessible only by admin (e.g. POST/books,  PUT /books{id}, ...)
        Route::resource('books', BookController::class)->except(['create','edit']);
    });

});



