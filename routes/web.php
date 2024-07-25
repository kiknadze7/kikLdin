<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\VacancionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/vacancion/create', [VacancionController::class, 'create'])->name('vacancion.create');
    Route::post('/vacancion', [VacancionController::class, 'store'])->name('vacancion.store');
    Route::put('/vacancion/{vacancion}', [VacancionController::class, 'update'])->name('vacancion.update');
    Route::delete('/vacancion/{vacancion}', [VacancionController::class, 'destroy'])->name('vacancion.destroy');
    Route::get('/vacancion/{vacancy}/edit', [VacancionController::class, 'edit'])->name('vacancion.edit');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
});


Route::get('/vacancion', [VacancionController::class, 'index'])->name('vacancion.index');
Route::get('/vacancies/{vacancy}', [VacancionController::class, 'show'])->name('vacancion.show');
