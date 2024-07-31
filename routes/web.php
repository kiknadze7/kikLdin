<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\VacancionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index'])->name('welcome');

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/vacancion/create', [VacancionController::class, 'create'])->name('vacancion.create');
    Route::post('/vacancion', [VacancionController::class, 'store'])->name('vacancion.store');
    Route::get('/vacancion/{vacancy}/edit', [VacancionController::class, 'edit'])->name('vacancion.edit');
    Route::put('/vacancion/{vacancion}', [VacancionController::class, 'update'])->name('vacancion.update');
    Route::delete('/vacancion/{vacancion}', [VacancionController::class, 'destroy'])->name('vacancion.destroy');
    Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
});


Route::get('/vacancies/{vacancy}', [VacancionController::class, 'show'])->name('vacancion.show');
