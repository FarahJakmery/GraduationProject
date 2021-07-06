<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthenticatedController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\LectureController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
});
route::post('/login', [AuthenticatedController::class, 'login']);
route::post('/register', [RegisterController::class, 'store']);
Route::get('/years', [YearController::class, 'index']);
Route::get('/years/{id}', [YearController::class, 'show']);
Route::get('/semesters/{id}', [SemesterController::class, 'show']);
Route::get('/courses/{id}', [CourseController::class, 'show']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/search', [SearchController::class, 'search']);
Route::get('/lectures/{id}', [LectureController::class, 'show']);
Route::get('/lectures/{id}/download', [LectureController::class, 'download']);
