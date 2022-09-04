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
			'movie' => $movie,
		]);
	}

	public function store(AddMovieRequest $request): RedirectResponse
	{
		Movie::create($request);
		return redirect('/');
	}
}
