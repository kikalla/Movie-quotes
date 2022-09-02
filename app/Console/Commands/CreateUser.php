<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'createuser';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$username = $this->ask('Enter Your Username');
		$email = $this->ask('Enter your Email');
		$password = $this->ask('Enter your Password');

		User::create([
			'username' => $username,
			'email'    => $email,
			'password' => $password,
		]);
	}
}
