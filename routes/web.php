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

Route::get('/', function () {return view('home', ['movies' => Movie::all()]); })->name('home');
Route::get('movies/{movie:id}', [MovieController::class, 'show'])->name('movie-page')->middleware('auth');
Route::get('movies', [MovieController::class, 'movies'])->name('movies-page')->middleware('auth');

Route::get('add-movie', function () {return view('/add-movie'); })->name('add-movie-page')->middleware('auth');
Route::post('add-movie', [MovieController::class, 'store'])->name('add-movie')->middleware('auth');
Route::post('movies/{movie:id}', [QuoteController::class, 'store'])->name('add-quote')->middleware('auth');

Route::get('login', function () {return view('login'); })->name('login-page')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');
