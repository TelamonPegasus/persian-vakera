<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/findIDState', [App\Http\Controllers\HomeController::class, 'findIDState'])->name('findIDState');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');


Route::get('/xxx', [App\Http\Controllers\HomeController::class, 'xxx'])->name('xxx');




Route::view('/code1', 'Home.code1')->name('code1');
Route::view('/code2', 'Home.code2')->name('code2');
Route::view('/code3', 'Home.code3')->name('code3');
Route::view('/code4', 'Home.code4')->name('code4');

Route::view('/code6', 'Home.code6')->name('code6');