<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();

Route::resource('/students', \App\Http\Controllers\StudentController::class);

Route::get('/students/{id}', function () {

})->name('student_info');

Route::get('/groups', [\App\Http\Controllers\GroupController::class, 'index'] )->name('groups');

Route::get('/courses', [\App\Http\Controllers\CourseController::class, 'index'])->name('courses');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
