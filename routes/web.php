<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('/cursos')->name('courses.')->group(function() {
    Route::get('/', [CoursesController::class, 'index'])->name('index');
    Route::get('/detalle/{id}', [CoursesController::class, 'cursos'])->name('detalle');
});

Route::prefix('/agenda')->name('schedule.')->group(function() {
	Route::get('/', [ScheduleController::class, 'index'])->name('index');
});

Route::prefix('/biblioteca')->name('library.')->group(function() {
    Route::get('/', [LibraryController::class, 'index'])->name('index');
    Route::get('/categoria/{category:slug}', [LibraryController::class, 'indexByCategory'])->name('indexByCategory');
    Route::get('/{slug}/{book}', [LibraryController::class, 'show'])->name('show');
});

Route::name('home.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/{page:slug}', [HomeController::class, 'page'])->name('page');
});
