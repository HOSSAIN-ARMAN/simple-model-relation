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
    return view('welcome');
});

Route::group(['prefix'=>'student', 'middleware' => ['auth:web']], function (){
    Route::get('/index', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
    Route::post('/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
    Route::get('/show', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
    Route::get('/assign/{id?}', [App\Http\Controllers\StudentController::class, 'assignTeacher'])->name('assign.teacher');
    Route::post('/confirm', [App\Http\Controllers\StudentController::class, 'confirmTeacher'])->name('confirm.teacher');
    Route::get('/edit/{id?}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
    Route::patch('/update', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
    Route::delete('/destroy', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');
});

//Route::get('/student/index', [App\Http\Controllers\StudentController::class, 'index'])->name('student.index');
//Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store'])->name('student.store');
//Route::get('/student/show', [App\Http\Controllers\StudentController::class, 'show'])->name('student.show');
//Route::get('/teacher/assign/{id?}', [App\Http\Controllers\StudentController::class, 'assignTeacher'])->name('assign.teacher');
//Route::post('/teacher/confirm', [App\Http\Controllers\StudentController::class, 'confirmTeacher'])->name('confirm.teacher');
//Route::get('/student/edit/{id?}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student.edit');
//Route::patch('/student/update', [App\Http\Controllers\StudentController::class, 'update'])->name('student.update');
//Route::delete('/student/destroy', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student.destroy');



require_once __DIR__ .'/admin/department.php';  //department
require_once __DIR__ .'/admin/teacher.php';  //teacher




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
