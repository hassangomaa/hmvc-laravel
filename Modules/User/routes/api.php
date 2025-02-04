<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;
use App\Http\Middleware\EnforceJsonResponse;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */


Route::middleware(['api', 'auth:sanctum', EnforceJsonResponse::class])->prefix('v1')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index'); // List all users
        Route::post('/', [UserController::class, 'store'])->name('users.store'); // Create a new user
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show'); // Get a user
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update'); // Update a user
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Delete a user
    });

});

