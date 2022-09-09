<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\LoginController;
use App\Models\Movie;
use App\Models\Quote;
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
Route::get('movie/{movie}/edit', function (Movie $movie) {return view('edit-movie', ['movie' => $movie]); })->name('edit-movie')->middleware('auth');
Route::get('movie/{movie}/edit/{quote:id}', function (Movie $movie, Quote $quote) {return view('edit-quote', ['quote' => $quote, 'movie' => $movie]); })->name('edit-quote')->middleware('auth');

Route::controller(MovieController::class)->group(function () {
	Route::get('movies/{movie}', 'show')->name('movie-show');
	Route::get('movies', 'movies')->name('movies-show');
	Route::get('/', 'getRandomQuote')->name('get-random-quote');
	Route::middleware('auth')->group(function () {
		Route::post('movies', 'store')->name('movie-create');
		Route::patch('movies/{movie}/edit', 'update')->name('update-movie');
		Route::delete('movies/{movie}', 'destroy')->name('destroy-movie');
	});
});

Route::controller(QuoteController::class)->group(function () {
	Route::middleware('auth')->group(function () {
		Route::post('movies/{movie:id}/quotes', 'store')->name('store-quote');
		Route::patch('movie/{movie:id}/edit/{quote:id}', 'update')->name('update-quote');
		Route::delete('quotes/{quote}', 'destroy')->name('destroy-quote');
	});
});

Route::get('login', function () {return view('login'); })->name('login-show')->middleware('guest');
Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
