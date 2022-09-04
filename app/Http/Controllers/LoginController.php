<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$attributes = $request->validated();

		if (auth()->attempt($attributes))
		{
			redirect('/');
		}

		throw ValidationException::withMessages(['email' => 'Your provided credentials could not be verified.']);
	}

	public function destroy(): RedirectResponse
	{
		auth()->logout();
		return redirect('/')->with('sucsess', 'Goodbye');
	}
}
