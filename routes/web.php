<?php

use Illuminate\Support\Facades\Route;

// Admin
use App\Http\Controllers\Admin\YearController as AdminYearController;
use App\Http\Controllers\Admin\SemesterController as AdminSemesterController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ProfessorController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentNumberController;
// professor
use App\Http\Controllers\Professor\QuestionController;
use App\Http\Controllers\Professor\QuizController;
use App\Http\Controllers\Professor\LectureController;
use App\Http\Controllers\Professor\OptionController;
use App\Http\Controllers\Professor\ProfileController as ProfessorProfileController;
use App\Http\Controllers\Professor\ResultController as ProfessorResultController;
// Student
use App\Http\Controllers\Student\YearController;
use App\Http\Controllers\Student\SemesterController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\QuizController as StudentQuizController;
use App\Http\Controllers\Student\LectureController as StudentLectureController;
use App\Http\Controllers\Student\ResultController;
use App\Http\Controllers\Student\SearchController;
use App\Http\Controllers\Student\ProfileController;

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


Route::group(['prefix' => '/admin', 'middleware' => 'role:Admin'], function () {
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

    //studentNumber Route
    Route::resource('/studentnumbers', StudentNumberController::class);
});

Route::group(['prefix' => '/professor', 'middleware' => 'role:Professor'], function () {
    //profile Routes
    Route::resource('/profprofile', ProfessorProfileController::class);
    // lectures Routes
    Route::resource('/lectures', LectureController::class);

    // quiz Routes
    Route::resource('/quizzes', QuizController::class);

    // question Routes
    Route::resource('/questions', QuestionController::class);

    // Option Route
    Route::resource('/options', OptionController::class);

    // result Route
    Route::get('/profresult/quiz/{id}', [ProfessorResultController::class, 'index'])->name('professorresults.index');
    //Post Route
});

Route::group(['prefix' => '/student', 'middleware' => 'role:Student'], function () {
    //Search Route
    Route::get('/search', [SearchController::class, 'search'])->name('search');

    // year route
    Route::get('/years', [YearController::class, 'index'])->name('years.index');
    Route::get('/years/{id}', [YearController::class, 'show'])->name('years.show');

    // semester route
    Route::resource('semesters', SemesterController::class);

    // Course Route
    Route::get('/courses', [CourseController::class, 'index'])->name('studentcourses.index');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('studentcourses.show');

    // lecture route
    Route::get('/lectures/{id}', [StudentLectureController::class, 'show'])->name('studentlectures.show');
    Route::get('/lectures/{id}/download', [StudentLectureController::class, 'download'])->name('downloadfile.download');

    //Quiz Route
    Route::get('/quizzes', [StudentQuizController::class, 'index'])->name('studentquizzes.index');
    Route::get('/quizzes/{id}', [StudentQuizController::class, 'show'])->name('studentquizzes.show');
    Route::post('/course/quizzes/{quiz}', [StudentQuizController::class, 'store'])->name('studentquizzes.store');

    // Result Route
    Route::get('/results', [ResultController::class, 'index'])->name('results.index');

    //profile Routes
    Route::resource('/profile', ProfileController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';
