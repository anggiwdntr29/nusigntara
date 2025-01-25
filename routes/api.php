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

    Route::get('/home', [HomeController::class, 'index']); // HOME
    Route::get('/search', [HomeController::class, 'search']); //SEARCH
    Route::get('/filter', [HomeController::class, 'filter']); //FILTER
    Route::get('/detailLesson/{id}', [HomeController::class, 'detailLesson']); //DETAIL LESSONS
    Route::get('/mySaved', [HomeController::class, 'mySaved']); //LIST SAVE
    Route::post('/saveLesson', [HomeController::class, 'saveLesson']); //SAVE LESSONS
});
