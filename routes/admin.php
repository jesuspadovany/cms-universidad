<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\ScheduleController;


Route::middleware('auth')->group(function() {
    Route::view ('/', 'admin.layouts.master')->name('index');

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
        Route::get('/cambiar-imagen', [LibraryController::class, 'changePageImage'])->name('changePageImage');
        Route::put('/cambiar-imagen', [LibraryController::class, 'storePageImage']);
        Route::get('/{book}/carta/editar', [LibraryController::class, 'editCard'])->name('editCard');
        Route::put('/{book}/carta', [LibraryController::class, 'updateCard'])->name('updateCard');
        Route::get('/{book}', [LibraryController::class, 'show'])->name('show');
        Route::get('/{book}/editar', [LibraryController::class, 'edit'])->name('edit');
        Route::put('/{book}', [LibraryController::class, 'update'])->name('update');
        Route::delete('/{book}', [LibraryController::class, 'delete'])->name('delete');
    });

    Route::prefix('/cursos')->name('courses.')->group(function() {
        Route::get('/', [CoursesController::class, 'index'])->name('index');
        Route::get('/crear', [CoursesController::class, 'create'])->name('create');
        Route::post('/crear', [CoursesController::class, 'store']);
        Route::get('/cambiar-imagen', [CoursesController::class, 'changePageImage'])->name('changePageImage');
        Route::put('/cambiar-imagen', [CoursesController::class, 'storePageImage']);
        Route::get('/actualizar/{course}', [CoursesController::class, 'updateCourseComponent'])->name('update');
        Route::put('/actualizar/{course}', [CoursesController::class, 'storeUpdate'])->name('actualizar');
        Route::delete('/{course}', [CoursesController::class, 'delete'])->name('eliminar');
    });

    Route::prefix('/paginas')->name('pages.')->group(function() {
        Route::get('/{page:slug}', [PagesController::class, 'show'])->name('show');
        Route::get('/{page:slug}/editar', [PagesController::class, 'edit'])->name('edit');
        Route::put('/{page:slug}', [PagesController::class, 'update'])->name('update');
        Route::get('/{page:slug}/imagen/editar', [PagesController::class, 'editImage'])->name('editImage');
        Route::put('/{page:slug}/imagen', [PagesController::class, 'updateImage'])->name('updateImage');
    });
});


