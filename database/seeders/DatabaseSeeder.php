<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		fake()->seed('pubcol');

		$this->call([
			SiteAndUnitSeeder::class,
			ReportEntrySeeder::class,
		]);
	}
}
