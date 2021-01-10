<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix' => 'teacher'], function () {
    Route::get('/index', [\App\Http\Controllers\TeacherCotroller::class, 'index'])->name('teacher.index');
    Route::post('/store', [\App\Http\Controllers\TeacherCotroller::class, 'store'])->name('teacher.store');
    Route::get('/show', [\App\Http\Controllers\TeacherCotroller::class, 'show'])->name('teacher.show');
    Route::get('/edit/{id?}', [\App\Http\Controllers\TeacherCotroller::class, 'edit'])->name('teacher.edit');
    Route::patch('/update', [\App\Http\Controllers\TeacherCotroller::class, 'update'])->name('teacher.update');
    Route::delete('/destroy', [\App\Http\Controllers\TeacherCotroller::class, 'destroy'])->name('teacher.destroy');
});

