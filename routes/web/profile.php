<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Profile\RegisterController::class, 'index'])->name('index');
Route::put('/save/{user}', [App\Http\Controllers\Profile\RegisterController::class, 'save'])->name('save');

