<?php

use App\Negocio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NegociosTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Model::unguard();

		$faker = Faker\factory::create();

		foreach (range(1,75) as $index) {
			Negocio::create([
				'nombre_negocio' => $faker->sentence(4),
				'correo' => $faker->email,
				'descripcion' => $faker->paragraph(1),
				'categoria' => $faker->numberBetween($min = 1, $max = 13),
				'direccion' => $faker->address,
				'telefono' => $faker->phoneNumber,
				'sitio_web' => $faker->domainName,
				'coords' => '20.' . $faker->numberBetween($min = 690000, $max = 700000) . ',-103.' . $faker->numberBetween($min = 370000, $max = 380000),
				'fb' => $faker->word,
				'tw' => $faker->word,
				'ig' => $faker->word,
				'ciudad' => $faker->randomElement(['Irapuato', 'Salamanca', 'Celaya', 'Guadalajara', 'Zapopan', 'Tlaquepaque', 'Hermosillo', 'Cd. Obregón', 'San Luis Potosí', 'Tijuana', 'Ensenada']),
				'status' => $faker->randomElement([0,1]),
				'nombre_responsable' => $faker->name,
				'correo_responsable' => $faker->email,
				'telefono_responsable' => $faker->phoneNumber
				]);
		}
		
	}

}
