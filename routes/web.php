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

Route::get('/students', function () {

    $students = \App\Models\Student::all();

        return view('studentslist', ['students'=>$students]);


})->name('students');

Route::get('/students/{id}', function () {

})->name('student_info');

Route::get('/groups', function () {
    $groups = \App\Models\Group::all();
    return view('groups', ['groups'=>$groups]);
})->name('groups');

Route::get('/courses', function () {
    $courses = \App\Models\Course::all();
    return view('courses', ['courses'=>$courses]);
})->name('courses');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
