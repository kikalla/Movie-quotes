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
		$request->validated(); //aaaa

		$movie->quotes()->create([
			'title' => $request->title, //aaaa
			'photo' => $request->file('photo')->store('photos'),
		]);

		return redirect('/');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();
		return back();
	}

	public function update(AddQuoteRequest $request, Movie $movie, Quote $quote): RedirectResponse
	{
		$request->validated(); //aaa

		$quote->update([
			'title' => request('title'),
			'photo' => request()->file('photo')->store('photos'),
		]);

		return redirect(route('movie-show', $movie));
	}
}
