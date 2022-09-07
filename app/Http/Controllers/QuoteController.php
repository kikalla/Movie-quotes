<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

	public function destroy(Movie $movie, Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}

	public function edit(Movie $movie, Quote $quote): View
	{
		return view('edit-quote', ['quote' => $quote, 'movie' => $movie]);
	}

	public function update(AddQuoteRequest $request, Movie $movie, Quote $quote): RedirectResponse
	{
		$request->validated();

		$quote->update([
			'title' => request('title'),
			'photo' => request()->file('photo')->store('photos'),
		]);

		return back();
	}
}
