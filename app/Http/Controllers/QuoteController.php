<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{
	public function store(Movie $movie): RedirectResponse
	{
		request()->validate([
			'title' => 'required',
			'photo' => 'required|image',
		]);

		$movie->quotes()->create([
			'title' => request('title'),
			'photo' => request()->file('photo')->store('photos'),
		]);

		return redirect('/');
	}
}
