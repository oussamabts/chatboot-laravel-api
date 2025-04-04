<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/**
 * Authenticated Routes
 */
Route::prefix('auth')->group(function() {
    /**
     * Register Route
     */
    Route::post('register', [AuthController::class, 'register']);

    /**
     * Login Route
     */
    Route::post('login', [AuthController::class, 'login']);
});
