<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\YearController;

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
// Public Routes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Protected Routes
Route::group(['middleware' => 'auth:sanctum'], function () {

    // profile  Api
    Route::get('/show/{id}', [ProfileController::class, 'show']);
    Route::put('/update/{id}', [ProfileController::class, 'update']);

    // Search Api
    Route::get('/search', [SearchController::class, 'search']);

    // Year Api
    Route::get('/years', [YearController::class, 'index']);
    Route::get('/years/{id}', [YearController::class, 'show']);

    // Semester Api
    Route::get('/semesters/{id}', [SemesterController::class, 'show']);

    // Course Api
    Route::get('/courses/{id}', [CourseController::class, 'show']);

    //lectures Api
    Route::get('/lectures/{id}', [LectureController::class, 'show']);
    Route::get('/lectures/{lecture}/download', [LectureController::class, 'download']);

    // Logout Api
    Route::post('/logout', [RegisterController::class, 'logout']);
});
