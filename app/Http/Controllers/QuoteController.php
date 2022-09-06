<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;

class QuoteController extends Controller
{
	public function store(AddQuoteRequest $request, Movie $movie): RedirectResponse
	{
		$request->validated();

		$movie->quotes()->create([
			'title' => request('title'),
			'photo' => request()->file('photo')->store('photos'),
		]);

		return redirect('/');
	}

	public function destroy(Movie $movie, Quote $quote)
	{
		$quote->delete();
		return back();
	}
}
