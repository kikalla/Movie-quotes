<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('movies/{movie:id}', [MovieController::class, 'show'])->name('movie-page');

Route::get('add-movie', [UserController::class, 'index'])->name('create-movie-page');
Route::post('add-movie', [MovieController::class, 'store'])->name('create-movie');
Route::post('movies/{movie:id}', [QuoteController::class, 'store'])->name('create-quote');
