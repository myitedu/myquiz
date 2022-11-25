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
Route::get('/', [\App\Http\Controllers\PublicController::class, 'index'])->name('home');
Route::get('/contactus', [\App\Http\Controllers\PublicController::class, 'contactus'])->name('contactus');
Route::get('/', [\App\Http\Controllers\PublicController::class, 'categories'])->name('categories');
Route::get('/questions/{category_id}', [\App\Http\Controllers\PublicController::class, 'questions'])->name('questions');
