<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoriesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Model::unguard();

		Category::create(['name' => 'Medicina y terapias alternativas', 'parent' => 0]);
		Category::create(['name' => 'Actividades holisticas', 'parent' => 0]);
		Category::create(['name' => 'Alimentacion / Nutrición', 'parent' => 0]);
		Category::create(['name' => 'Centros', 'parent' => 0]);
		Category::create(['name' => 'Ecoespiritualidad', 'parent' => 0]);
		Category::create(['name' => 'Eventos', 'parent' => 0]);
		Category::create(['name' => 'Educación y capacitación', 'parent' => 0]);
		Category::create(['name' => 'Espiritualidad y misticismo', 'parent' => 0]);
		Category::create(['name' => 'Terapeutas', 'parent' => 0]);
		Category::create(['name' => 'Esoterica', 'parent' => 0]);
		Category::create(['name' => 'Musica y danza', 'parent' => 0]);
		Category::create(['name' => 'Religion y filosofia', 'parent' => 0]);
		Category::create(['name' => 'Tiendas', 'parent' => 0]);
		
	}
}