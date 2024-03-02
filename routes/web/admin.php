<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
Route::get('/users/show/{user}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('users.show');
Route::put('/users/approved/{user}', [App\Http\Controllers\Admin\UserController::class, 'approved'])->name('users.approved');
Route::put('/users/upApproved/{user}', [App\Http\Controllers\Admin\UserController::class, 'upApproved'])->name('users.upApproved');
