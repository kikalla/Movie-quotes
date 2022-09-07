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

Route::controller(MovieController::class)->group(function () {
	Route::get('movies/{movie:id}', 'show')->name('movie-show');
	Route::get('movies', 'movies')->name('movies-show');
	Route::get('/', 'getRandomQuote')->name('get-random-quote');
	Route::post('movies', 'store')->name('movie-create')->middleware('auth');
	Route::get('edit/movie/{movie:id}', 'edit')->name('edit-movie')->middleware('auth');
	Route::patch('edit/movie/{movie:id}', 'update')->name('update-movie')->middleware('auth');
	Route::delete('movies/delete/{movie:id}', 'destroy')->name('destroy-movie')->middleware('auth');
});

Route::controller(QuoteController::class)->group(function () {
	Route::post('movies/{movie:id}/quotes', 'store')->name('quote-create')->middleware('auth');
	Route::get('edit/movie/{movie:id}/{quote:id}', 'edit')->name('edit-quote')->middleware('auth');
	Route::patch('edit/movie/{movie:id}/{quote:id}', 'update')->name('update-quote')->middleware('auth');
	Route::delete('movies/{movie:id}/delete/{quote:id}', 'destroy')->name('destroy-quote')->middleware('auth');
});

Route::get('login', function () {return view('login'); })->name('login-show')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
