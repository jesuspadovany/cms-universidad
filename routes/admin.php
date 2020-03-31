<?php

use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'admin.layouts.master');

Route::prefix('/slider')->name('slider.')->group(function() {
	Route::get('/', [SliderController::class, 'index'])->name('index');
    Route::get('/crear', [SliderController::class, 'create'])->name('create');
});

Route::prefix('/agenda')->name('schedule.')->group(function() {
    Route::get('/', [ScheduleController::class, 'index'])->name('index');
    Route::get('/crear', [ScheduleController::class, 'create'])->name('create');
    Route::get('/slider', [ScheduleController::class, 'slider'])->name('slider');
});
