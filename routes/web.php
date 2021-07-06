<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\YearController as AdminYearController;
use App\Http\Controllers\Admin\SemesterController as AdminSemesterController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ProfessorController;
use App\Http\Controllers\Admin\StudentController;
// professor
use App\Http\Controllers\Professor\QuestionController;
use App\Http\Controllers\Professor\QuizController;
use App\Http\Controllers\Professor\LectureController;
use App\Http\Controllers\Professor\OptionController;
use App\Http\Controllers\Student\ResultController as ProfessorResultController;
// Student
use App\Http\Controllers\Student\YearController;
use App\Http\Controllers\Student\SemesterController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\QuizController as StudentQuizController;
use App\Http\Controllers\Student\LectureController as StudentLectureController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => '/student', 'middleware' => ['role:Student']], function () {
    //Search Route
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // year route
    Route::get('/years', [YearController::class, 'index'])->name('years.index');
    Route::get('/years/{id}', [YearController::class, 'show'])->name('years.show');

    // semester route
    Route::resource('semesters', SemesterController::class);
    // semester route
    Route::get('/semesters/{id}', [SemesterController::class, 'show'])->name('years.show');

    // Course Route
    Route::get('/courses', [CourseController::class, 'index'])->name('studentcourses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('studentcourses.show');

    // lecture route
    Route::get('/lectures/{id}', [StudentLectureController::class, 'show'])->name('studentlectures.show');

    //Quiz Route
    Route::get('/quizzes', [StudentQuizController::class, 'index'])->name('studentquizzes.index');
    Route::get('/quizzes/{id}', [StudentQuizController::class, 'show'])->name('studentquizzes.show');
    Route::post('/course/quizzes/{quiz}', [StudentQuizController::class, 'store'])->name('studentquizzes.store');
    // download route
    Route::get('/lectures/{lecture}/download', [StudentLectureController::class, 'download'])->name('downloadfile.download');
    // Result Route
    Route::get('/results', [ResultController::class, 'index'])->name('results.index');
});

Route::group(['prefix' => '/professor', 'middleware' => 'role:Professor'], function () {
    // lectures Routes
    Route::resource('/lectures', LectureController::class);

    // quiz Routes
    Route::resource('/quizzes', QuizController::class);

    // question Routes
    Route::resource('/questions', QuestionController::class);

    // Option Route
    Route::resource('/options', OptionController::class);

    // Result Route
    Route::get('/results', [ProfessorResultController::class, 'index'])->name('professorresults.index');

    //Post Route
});

Route::group(['prefix' => '/admin'], function () {
    // year route
    Route::get('/years/create', [AdminYearController::class, 'create'])->name('adminyear.create');
    Route::post('/years', [AdminYearController::class, 'store'])->name('adminyear.store');

    // Semester Route
    Route::get('/semesters/create', [AdminSemesterController::class, 'create'])->name('adminsemester.create');
    Route::post('/semesters', [AdminSemesterController::class, 'store'])->name('adminsemester.store');

    // course route
    Route::resource('/courses', AdminCourseController::class);

    // Professor Route
    Route::resource('/professors', ProfessorController::class);

    // Student Route
    Route::resource('/students', StudentController::class);

    // user route
    // Route::resource('/users', UserController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
