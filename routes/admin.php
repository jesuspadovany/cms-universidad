<?php

use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.layouts.master');

Route::prefix('/slider')->name('slider.')->group(function() {
	Route::get('/', [SliderController::class, 'index'])->name('index');
    Route::get('/crear', [SliderController::class, 'create'])->name('create');
    Route::post('/crear', [SliderController::class, 'store']);
    Route::delete('/{slide}', [SliderController::class, 'delete'])->name('delete');
});

Route::prefix('/agenda')->name('schedule.')->group(function() {
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
    Route::get('/crear', [ScheduleController::class, 'create'])->name('create');
    Route::get('/slider', [ScheduleController::class, 'slider'])->name('slider');
});

Route::prefix('/biblioteca')->name('library.')->group(function() {
    Route::get('/', [LibraryController::class, 'index'])->name('index');
    Route::get('/crear', [LibraryController::class, 'create'])->name('create');
    Route::post('/crear', [LibraryController::class, 'store']);
    Route::delete('/{book}', [LibraryController::class, 'delete'])->name('delete');
    Route::get('/cambiar-imagen', [LibraryController::class, 'changePageImage'])->name('changePageImage');
    Route::put('/cambiar-imagen', [LibraryController::class, 'storePageImage']);
    Route::get('/slider', [LibraryController::class, 'slider'])->name('slider');
    Route::put('/slider', [LibraryController::class, 'storeBooksSliderOrder']);
});

Route::prefix('/cursos')->name('courses.')->group(function() {
    Route::get('/', [CoursesController::class, 'index'])->name('index');
    Route::get('/cambiar-imagen', [CoursesController::class, 'changePageImage'])->name('changePageImage');
    Route::put('/cambiar-imagen', [CoursesController::class, 'storePageImage']);
});
