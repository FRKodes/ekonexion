<?php

use App\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BannersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Model::unguard();

		$faker = Faker\factory::create();

		foreach (range(1,6) as $index) {
			Banner::create([
				'title' => $faker->sentence(4),
				'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
				'link' => $faker->url,
				'place' => $faker->randomElement(['home', 'inner', 'footer'])
				]);
		}
		
	}

}
