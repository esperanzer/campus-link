<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('students', StudentController::class);
// Route::get('students/index', [StudentController::class, 'index'])->name('students.index');