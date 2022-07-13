<?php

namespace App\Http\Controllers;

use App\Models\ReportEntry;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIController extends Controller
{
	/**
	 * Max number of reports per page
	 */
	const MAX_REPORTS_PER_PAGE = 2000;

	/**
	 * Fetch daily data for the fake API endpoint
	 * @param  Request $request
	 * @return Array
	 */
	public function fetchReport(Request $request) {
		// Set the pagination vars
		$page = is_null($request->get('page')) ? 1 : (int) $request->get('page');

		// Get the start/end date from endpoint query string...
		$startDate = Carbon::createFromFormat('Y-m-d', $request->get('start') ?: Carbon::yesterday()->format('Y-m-d'))->startOfDay();
		$endDate = Carbon::createFromFormat('Y-m-d', $request->get('end') ?: Carbon::today()->format('Y-m-d'))->startOfDay();

		// Do not allow start date that is after end date
		if($endDate->lt($startDate)) {
			return ['error' => 'Start date cannot be later than end date'];
		}

		// Fetch all the Unit id's for the faker seeding
		$units = Unit::all('id');
		$unitsCount = count($units);

		// Initiate variables before while-loop
		$fetchDate = $startDate;
		$entries = collect();

		// While fetchDate is smaller or equal to endDate
		while($fetchDate->lessThanOrEqualTo($endDate)){
			// Set seed ID to $fetchdate so daily data is always consistent
			fake()->seed($fetchDate->valueOf());

			// Make some ReportEntries for each day and hide the updated_at column
			$date_entries = ReportEntry::factory(fake()->numberBetween(100, $unitsCount))->make([
				'created_at' => $fetchDate
			])->makeHidden('updated_at');

			// Assign each ReportEntry to a random Unit
			$date_entries->each(function($entry) use ($units) {
				$entry->unit_id = fake()->randomElement($units)->id;
			});

			// Add this dates entries to the collection
			$entries = $entries->concat($date_entries);

			// Move to next day and repeat...
			$fetchDate->addDays(1);
		}

		$totalPages = ceil($entries->count() / self::MAX_REPORTS_PER_PAGE);

		if($page < 1 || $page > $totalPages) {
			return ['error' => sprintf('Requested page out of range (Requested page %s of %s total pages)', $page, $totalPages)];
		}

		return [
			'startDate' => $startDate->format('Y-m-d'),
			'endDate' => $endDate->format('Y-m-d'),
			'page' => $page ?? 1,
			'totalPages' => $totalPages,
			'reports' => $entries->slice(($page-1) * self::MAX_REPORTS_PER_PAGE, self::MAX_REPORTS_PER_PAGE)->values()
		];
	}
}
