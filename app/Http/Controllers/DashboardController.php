<?php

namespace App\Http\Controllers;

use App\Models\ReportEntry;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Revenue by Day
	 *
	 * @param  Request $request
	 * @return Illuminate\View\View
	 */
	function days(Request $request)
	{
		$reportType = 'Day';

		// Get the start/end date from endpoint query string. Default last 7 days
		$startDate = Carbon::createFromFormat('Y-m-d', $request->get('start') ?: Carbon::today()->subDays(7)->format('Y-m-d'));
		$endDate = Carbon::createFromFormat('Y-m-d', $request->get('end') ?: Carbon::today()->format('Y-m-d'));

		/**
		 * Select ReportEntries and sum of revenue grouped by day
		 * (columns: report_entry.created_at as name, report_entry.revenue)
		 *
		 * Notes:
		 * Date should be formatted as "Tue 12th Jul, 2022"
		 */
		$report = ReportEntry::selectRaw('SUM(revenue) as revenue, created_at as name')
			->orderBy('created_at', 'DESC')
			->where('created_at', '>=', $startDate)
			->where('created_at', '<=', $endDate)
			->groupBy('created_at')
			->get();

		return view('dashboard', compact('reportType', 'startDate', 'endDate', 'report'));
	}


	/**
	 * Revenue by Advertiser
	 *
	 * @param  Request $request
	 * @return Illuminate\View\View
	 */
	function advertisers(Request $request)
	{
		$reportType = 'Advertiser';

		// Get the start/end date from endpoint query string. Default last 7 days
		$startDate = Carbon::createFromFormat('Y-m-d', $request->get('start') ?: Carbon::today()->subDays(7)->format('Y-m-d'));
		$endDate = Carbon::createFromFormat('Y-m-d', $request->get('end') ?: Carbon::today()->format('Y-m-d'));

		/**
		 * Select ReportEntries grouped by Advertiser name
		 * (columns: report_entry.name, report_entry.revenue)
		 * Sort the results by Advertiser name numerically ('ABC1', 'ABC2', 'ABC3'...)
		 * _NOT_ alphabetically ('ABC1', 'ABC10', 'ABC11', 'ABC2', 'ABC3'...)
		 */
		$report = ReportEntry::orderby('name');

		return view('dashboard', compact('reportType', 'startDate', 'endDate', 'report'));
	}


	/**
	 * Revenue by Unit
	 *
	 * @param  Request $request
	 * @return Illuminate\View\View
	 */
	function units(Request $request)
	{
		$reportType = 'Unit';

		// Get the start/end date from endpoint query string. Default last 7 days
		$startDate = Carbon::createFromFormat('Y-m-d', $request->get('start') ?: Carbon::today()->subDays(7)->format('Y-m-d'));
		$endDate = Carbon::createFromFormat('Y-m-d', $request->get('end') ?: Carbon::today()->format('Y-m-d'));

		/**
		 * Select Units with a sum of revenue for each one. This will require
		 * joining the units table to the report_entries table
		 * (columns: unit.name, report_entries.revenue)
		 *
		 * Notes:
		 * Sort the results by Unit name numerically (1, 2, 3...)
		 * _NOT_ alphabetically (1, 10, 11, 2, 3...)
		 */
		$report = Unit::where('...');

		return view('dashboard', compact('reportType', 'startDate', 'endDate', 'report'));
	}
}
