<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard',[App\Http\Controllers\ProductController::class,'index'])->name('dashboard');
Route::get('/product_list/{id}',[App\Http\Controllers\ProductController::class,'product_list']);
Route::post('/product_detail/{id}',[App\Http\Controllers\ProductController::class,'product_detail']);
Route::post('/checkout_detail',[App\Http\Controllers\ProductController::class,'checkout_detail']);
Route::get('/checkout',[App\Http\Controllers\ProductController::class,'checkout'])->name('checkout');
Route::get('/report',[App\Http\Controllers\ProductController::class,'report'])->name('report');

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
