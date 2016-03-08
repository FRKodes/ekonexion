<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Model::unguard();

		$faker = Faker\factory::create();

		foreach (range(1,50) as $index) {
			User::create([
				'name' => $faker->sentence(3),
				'email' => $faker->email,
				'password' => Hash::make($faker->word)
				]);
		}
		
	}

}
