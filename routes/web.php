<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    


});
require __DIR__.'/../routes/auth.php';
