<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'department',  'middleware'=>['auth:web']], function () {
    Route::get('/index', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('department.index');
    Route::post('/store', [\App\Http\Controllers\DepartmentController::class, 'store'])->name('department.store');
    Route::get('/show', [\App\Http\Controllers\DepartmentController::class, 'show'])->name('department.show');
    Route::get('/edit/{id?}', [\App\Http\Controllers\DepartmentController::class, 'edit'])->name('department.edit');
    Route::patch('/update', [\App\Http\Controllers\DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/destroy', [\App\Http\Controllers\DepartmentController::class, 'destroy'])->name('department.destroy');
});
