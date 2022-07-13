<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\ReportEntry;
use App\Models\Unit;
use Illuminate\Console\Command;

class API extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'api:import
							{--start= : Start Date [Y-m-d], (default: 2 days before end date)}
							{--end= : End Date [Y-m-d], (default: today)}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import entries from /api into the database as Unit entries';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		/**
		 * Boilerplate code for handling API call
		 * ---------------------------------------------------------------------
		 *
		 * Feel free to change any part of this handle method. The code provided
		 * is to help you get going quickly but do with this as you please.
		 */

		/**
		 * Get the flagged options that were passed to the command
		 */
		$options = $this->options();

		/**
		 * Set the endDate via --end flag or resort to the default value.
		 *
		 * Default: tonight
		 * @var Carbon
		 */
		$endDate = $options['end'] !== null
			? Carbon::createFromFormat('Y-m-d', $options['end'])
			: Carbon::today();
		$endDate->endOfDay();

		/**
		 * Set the startDate via --start flag or resort to the default value.
		 *
		 * Default: 7 days ago
		 * @var Carbon
		 */
		$startDate = $options['start'] !== null
			? Carbon::createFromFormat('Y-m-d', $options['start'])
			: $endDate->copy()->subDays(7);
		$startDate->startOfDay();


		/**
		 * REPLACE THE CODE BELOW WITH YOUR OWN
		 *
		 * The aim being to fetch data from the /api endpoint and import into
		 * the database as ReportEntry models.
		 *
		 * Treat /api as if it were a third-party API, so ensure that the code
		 * fails gracefully if the endpoint were to disappear or return an
		 * unexpected response.
		 *
		 * The /api endpoint accepts the following GET parameters:
		 * 		?page=1            : The pagination index
		 * 		?start=2022-07-01  : Start date of requested report
		 * 		?end=2022-07-15    : End date of requested report
		 *
		 * Passing any or none of these should return one of two response types:
		 *
		 *	- Error block - if an invalid date/page range is requested and error
		 *	  will be returned but this may not always be the case if something
		 *	  more fatal occurs like a 500 error or similar

		 *  	{
		 *	  		"error": "The error description"
		 *     	}
		 *
		 *  - ReportPage. Contains pagination information and where possible,
		 *    an array of report entries:
		 *
		 *		{
		 *	 		"startDate": "2022-07-01",
		 *	   		"endDate": "2022-07-15",
		 *	     	"page": 1,
		 *	      	"totalPages": 2,
		 *	       	"reports": [...]
		 *		}
		 *
		 *    The reports array in the ReportPage response, will contain multiple
		 *    ReportEntry definitions in the following format:
		 *
		 *    	{
		 *			"unit_id": 4552539,
		 *			"order_id": "41154752",
		 *			"advertiser": "Sovrn Header Bidder 8.01-12.00",
		 *			"revenue": 286258,
		 *			"created_at": "2022-07-11 00:00:00"
		 *		}
		 *
		 */

		/**
		 * @todo Remove and write your own code to process the API response
		 */
		$this->error('Please see `app/Console/Commands/API.php` and import data from ' . route('api'));
	}
}
