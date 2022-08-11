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
    echo '<pre>';
    foreach ($students as $student) {
       var_dump($student->toArray());
        var_dump($student->courses->toArray());
       var_dump($student->group->toArray());


    }

})->name('students');

Route::get('/students/{id}', function () {

})->name('student_info');

Route::get('/groups', function () {

})->name('groups');

Route::get('/courses', function () {

})->name('courses');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
