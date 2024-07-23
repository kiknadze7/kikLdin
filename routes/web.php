<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
// Route::post('/job', [JobController::class, 'store'])->name('job.store');
// Route::get('/job/{job}', [JobController::class, 'show'])->name('job.show');
// Route::put('/job/{job}', [JobController::class, 'update'])->name('job.update');
// Route::get('/job/{job}/edit', [JobController::class, 'edit'])->name('job.edit');
// Route::delete('/job/{job}', [JobController::class, 'destroy'])->name('job.destroy');
