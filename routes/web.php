<?php

use App\Http\Controllers\ProfileController;
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
Route::get('/', [\App\Http\Controllers\PublicController::class, 'categories'])->name('categories');
Route::get('/contactus', [\App\Http\Controllers\PublicController::class, 'contactus'])->name('contactus');
Route::get('/print/certificate/{user_id}', [\App\Http\Controllers\PublicController::class, 'print_certificate'])->name('print.certificate');


Route::get('/dashboard', [\App\Http\Controllers\PublicController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/questions/{category_id}', [\App\Http\Controllers\PublicController::class, 'questions'])->name('questions');
    Route::get('/thankyou/{category_id}', [\App\Http\Controllers\PublicController::class, 'thankyou'])->name('thankyou');
    Route::post('/answers/save', [\App\Http\Controllers\PublicController::class, 'user_answer_save'])->name('user_answer_save');

});

require __DIR__.'/auth.php';
