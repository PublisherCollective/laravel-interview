<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\Unit;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteAndUnitSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Site::factory(100)->hasOwners(3)->create()->each(function($site, $index=null) {
			// Create a bunch of units, named numerically MPU1, MPU2, MPU3, etc
			$units = Unit::factory(fake()->numberBetween(5, 15))->make([
				'site_id' => $site->id,
			])->each(function($unit, $index=null) use ($site) {
				$unit->name = $site->name .' - MPU'. ++$index;
			});

			// Save all the units but in a random order
			$site->units()->saveMany($units->shuffle());
		});
	}
}
