<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddMovieRequest;
use App\Models\Movie;
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
			'movie'  => $movie,
		]);
	}

	public function store(AddMovieRequest $request): RedirectResponse
	{
		$movie = new Movie();
		$movie->setTranslation('title', 'en', $request->title_en);
		$movie->setTranslation('title', 'ka', $request->title_ka);
		$movie->save();
		return redirect('/');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();
		return redirect('movies');
	}

	public function update(AddMovieRequest $request, Movie $movie): RedirectResponse
	{
		$movie->setTranslation('title', 'en', $request->title_en);
		$movie->setTranslation('title', 'ka', $request->title_ka);
		$movie->save();

		return redirect('movies');
	}
}
