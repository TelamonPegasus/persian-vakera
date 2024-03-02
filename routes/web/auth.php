<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/confirm', [App\Http\Controllers\Auth\MobileController::class, 'confirm'])->name('confirm');
Route::post('/loginByCode', [App\Http\Controllers\Auth\MobileController::class, 'loginByCode'])->name('loginByCode');
Route::get('/password', [App\Http\Controllers\Auth\MobileController::class, 'password'])->name('password');
Route::post('/save', [App\Http\Controllers\Auth\MobileController::class, 'save'])->name('save');
Route::get('/send-again-code', [App\Http\Controllers\Auth\MobileController::class, 'sendAgainCode'])->name('sendAgainCode');