<?php

namespace Database\Seeders;

use App\Models\ReportEntry;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportEntrySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$units = Unit::all('id');
		$unitsCount = count($units);

		// The oldest date we want to Seed from...
		$date = now()->startOfDay()->subDays(3);

		// Create a number of ReportEntries for each day until "today"
		$reportEntries = collect();
		while($date->lessThan(now())) {
			$date = $date->addDays(1);
			$reportEntries = $reportEntries->merge(
				ReportEntry::factory(fake()->numberBetween(100, $unitsCount))
					->make(['created_at' => $date->format('Y-m-d H:i:s')])
			);
		}

		// Assign each ReportEntry to a random Unit
		$reportEntries->each(function($reportEntry) use ($units) {
			$reportEntry->unit_id = fake()->randomElement($units)->id;
		});

		// Save all the ReportEntries in one query
		ReportEntry::insert($reportEntries->toArray());
	}
}
