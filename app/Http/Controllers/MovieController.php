<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovieRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
	public function movies(): View
	{
		return view('movies', [
			'movies' => Movie::all(),
		]);
	}

	public function show(Movie $movie): View
	{
		return view('movie', [
			'movie' => $movie,
		]);
	}

	public function store(AddMovieRequest $request): RedirectResponse
	{
		$request->validated();

		Movie::create([
			'title' => request('title'),
		]);
		return redirect('/');
	}

	public function getRandomMovie()
	{
		$movie = Movie::inRandomOrder()->first();
		return view('/home', [
			'movie' => $movie,
		]);
	}

	public function getRandomQuote()
	{
		$movie = Movie::inRandomOrder()->first();
		$movie_id = $movie->id;
		$quote = (Quote::all()->where('movie_id', $movie_id)->toArray() === []) ? 'No Quote Yet' : Quote::all()->where('movie_id', $movie_id)->random()->title;
		$quotePhoto = (Quote::all()->where('movie_id', $movie_id)->toArray() === []) ? '' : Quote::all()->where('movie_id', $movie_id)->random()->photo;
		return view('/home', [
			'movie'      => $movie,
			'quote'      => $quote,
			'quotePhoto' => $quotePhoto,
		]);
	}
}
