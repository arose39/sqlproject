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


Route::get('/groups', function (){

})->name('groups');

Route::get('/groups/{id}', function (){

})->name('group_students');

Route::get('/students', function (){

})->name('students');

Route::get('/students/{id}', function (){

})->name('student_info');

Route::get('/courses', function (){

})->name('courses');

Route::get('/courses/{id}', function (){

})->name('course_students');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
