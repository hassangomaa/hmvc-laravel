<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    // Route::prefix('users')->group(function () {
    //     Route::get('/', [UserController::class, 'index']); // List all users
    //     Route::post('/', [UserController::class, 'store']); // Create a new user
    //     Route::get('/{id}', [UserController::class, 'show']); // Show a single user
    //     Route::put('/{id}', [UserController::class, 'update']); // Update a user
    //     Route::delete('/{id}', [UserController::class, 'destroy']); // Delete a user
    // });


});



Route::apiResource( 'v1/users', controller: UserController::class);
