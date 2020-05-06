<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ScheduleController;

Route::view('/', 'admin.layouts.master')->name('index');

Route::middleware('auth')->group(function() {
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
        Route::get('/slider', [LibraryController::class, 'slider'])->name('slider');
        Route::put('/slider', [LibraryController::class, 'storeBooksSliderOrder']);
        Route::get('/{book}/editar', [LibraryController::class, 'edit'])->name('edit');
        Route::put('/{book}', [LibraryController::class, 'update'])->name('update');
        Route::delete('/{book}', [LibraryController::class, 'delete'])->name('delete');
        Route::get('/cambiar-imagen', [LibraryController::class, 'changePageImage'])->name('changePageImage');
        Route::put('/cambiar-imagen', [LibraryController::class, 'storePageImage']);
    });

    Route::prefix('/cursos')->name('courses.')->group(function() {
        Route::get('/', [CoursesController::class, 'index'])->name('index');
        Route::get('/cambiar-imagen', [CoursesController::class, 'changePageImage'])->name('changePageImage');
        Route::put('/cambiar-imagen', [CoursesController::class, 'storePageImage']);
    });

    Route::prefix('/paginas')->name('pages.')->group(function() {
        Route::get('/{page:slug}', [PagesController::class, 'show'])->name('show');
        Route::get('/{page:slug}/editar', [PagesController::class, 'edit'])->name('edit');
        Route::put('/{page:slug}', [PagesController::class, 'update'])->name('update');
        Route::get('/{page:slug}/imagen/editar', [PagesController::class, 'editImage'])->name('editImage');
        Route::put('/{page:slug}/imagen', [PagesController::class, 'updateImage'])->name('updateImage');
    });
});
