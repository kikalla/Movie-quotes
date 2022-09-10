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
		$quote = new Quote();

		$quote->setAttribute('movie_id', $movie->id);
		$quote->setTranslation('title', 'en', $request->title_en);
		$quote->setTranslation('title', 'ka', $request->title_ka);
		$quote->setAttribute('photo', $request->file('photo')->store('photos'));
		$quote->save();

		return redirect('/');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}

	public function update(AddQuoteRequest $request, Movie $movie, Quote $quote): RedirectResponse
	{
		$quote->setAttribute('movie_id', $movie->id);
		$quote->setTranslation('title', 'en', $request->title_en);
		$quote->setTranslation('title', 'ka', $request->title_ka);
		$quote->setAttribute('photo', $request->file('photo')->store('photos'));
		$quote->save();

		return redirect(route('movie-show', $movie));
	}
}
