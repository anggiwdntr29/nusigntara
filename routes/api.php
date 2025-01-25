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
    Route::get('/search', [HomeController::class, 'search']); //Save Lesson
    Route::get('/filter', [HomeController::class, 'filter']);
    Route::get('/detailLesson/{id}', [HomeController::class, 'detailLesson']);
    Route::get('/mySaved', [HomeController::class, 'mySaved']);
    Route::post('/saveLesson', [HomeController::class, 'saveLesson']); //Save Lesson
});
