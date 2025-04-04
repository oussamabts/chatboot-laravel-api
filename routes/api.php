<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->prefix('auth')->group(function() {
    /**
     * Logout the user
     */
    Route::post('logout', [AuthController::class, 'logout']);
});

/**
 * Authenticated Routes
 */
require __DIR__ . '/auth/auth.php';
