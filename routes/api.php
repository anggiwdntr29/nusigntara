<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']); // Register
    Route::post('/login', [AuthController::class, 'login']);       // Login
});

Route::middleware(['is_student'])->group(function () {

    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::post('/me', [AuthController::class, 'me']);
    });

    Route::get('/home', [HomeController::class, 'index']); // Page HOME
    Route::post('/home/save', [HomeController::class, 'saveLesson']); //Save Lesson
});
