<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
	public function index()
	{
		return view('home', [
			'movies' => Movie::all(),
		]);
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie' => $movie,
		]);
	}

	public function store(): RedirectResponse
	{
		$atributes = request()->validate([
			'title' => 'required|max:255|min:2',
		]);
		Movie::create($atributes);

		return redirect('/');
	}
}
