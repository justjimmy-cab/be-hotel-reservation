<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {

    // Admin-specific routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', function () {
            return \App\Models\User::paginate(10);
        });
        Route::put('/users/{id}/role', [UserController::class, 'updateRole']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']); 
    });

});
