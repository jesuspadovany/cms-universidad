<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::name('home.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/institucional', [HomeController::class, 'institutional'])->name('institutional');
    Route::get('/equipo', [HomeController::class, 'team'])->name('team');
    Route::get('/prensa', [HomeController::class, 'media'])->name('media');
});

Route::prefix('/cursos')->name('courses.')->group(function() {
	Route::get('/', [CoursesController::class, 'index'])->name('index');
});

Route::prefix('/agenda')->name('schedule.')->group(function() {
	Route::get('/', [ScheduleController::class, 'index'])->name('index');
});

Route::prefix('/biblioteca')->name('library.')->group(function() {
    Route::get('/', [LibraryController::class, 'index'])->name('index');
});
