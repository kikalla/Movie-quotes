<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
use App\Models\Movie;
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

Route::get('movies/create', function () {return view('movies-create'); })->name('movie-create-show')->middleware('auth');

Route::get('/', function () {return view('home', ['movies' => Movie::all()]); })->name('home');
Route::get('movies/{movie:id}', [MovieController::class, 'show'])->name('movie-show');
Route::get('movies', [MovieController::class, 'movies'])->name('movies-show');
Route::get('/', [MovieController::class, 'getRandomQuote'])->name('get-random-quote');
Route::post('movies', [MovieController::class, 'store'])->name('movie-create')->middleware('auth');

Route::post('movies/{movie:id}/quotes', [QuoteController::class, 'store'])->name('quote-create')->middleware('auth');

Route::get('login', function () {return view('login'); })->name('login-show')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
