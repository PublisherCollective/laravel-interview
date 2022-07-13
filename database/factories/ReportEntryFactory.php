<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportEntry>
 */
class ReportEntryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'unit_id' => fake()->numerify('#######'),
			'order_id' => fake()->numerify('########'),
			'advertiser' => fake()->randomElement([
				'Adagio Header Bidder 0.01-4.00',
				'Adagio Header Bidder 4.01-8.00',
				'Adagio Header Bidder 8.01-12.00',
				'Adagio Header Bidder 12.01-16.00',
				'Adagio Header Bidder 16.01-20.00',
				'AppNexus Header Bidder 0.01-4.00',
				'AppNexus Header Bidder 4.01-8.00',
				'AppNexus Header Bidder 8.01-12.00',
				'AppNexus Header Bidder 12.01-16.00',
				'AppNexus Header Bidder 16.01-20.00',
				'EBDA_Fluct',
				'EBDA_ImproveDigital',
				'EBDA_Index_Exchange',
				'EBDA_Media.net',
				'EBDA_OpenX',
				'EBDA_PubMatic',
				'EBDA_RhythmOne',
				'EBDA_Rubicon',
				'EBDA_Smaato',
				'EBDA_Smart_Adserver',
				'EBDA_Sonobi',
				'EBDA_Sovrn',
				'EBDA_Triplelift',
				'EBDA_Verizon_Display',
				'EBDA_YieldMo',
				'Index Exchange Header Bidder 0.01-4.00',
				'Index Exchange Header Bidder 4.01-8.00',
				'Index Exchange Header Bidder 8.01-12.00',
				'Index Exchange Header Bidder 12.01-16.00',
				'Index Exchange Header Bidder 16.01-20.00',
				'JustPremium Header Bidder 0.01-4.00',
				'JustPremium Header Bidder 4.01-8.00',
				'JustPremium Header Bidder 8.01-12.00',
				'JustPremium Header Bidder 12.01-16.00',
				'JustPremium Header Bidder 16.01-20.00',
				'OpenX Header Bidder 0.01-4.00',
				'OpenX Header Bidder 4.01-8.00',
				'OpenX Header Bidder 8.01-12.00',
				'OpenX Header Bidder 12.01-16.00',
				'OpenX Header Bidder 16.01-20.00',
				'Outbrain Header Bidder 0.01-4.00',
				'Outbrain Header Bidder 4.01-8.00',
				'Outbrain Header Bidder 8.01-12.00',
				'Outbrain Header Bidder 12.01-16.00',
				'Outbrain Header Bidder 16.01-20.00',
				'Playground XYZ Header Bidder 0.01-4.00',
				'PubMatic Header Bidder 0.01-4.00',
				'PubMatic Header Bidder 4.01-8.00',
				'PubMatic Header Bidder 8.01-12.00',
				'PubMatic Header Bidder 12.01-16.00',
				'PubMatic Header Bidder 16.01-20.00',
				'Sovrn Header Bidder 0.01-4.00',
				'Sovrn Header Bidder 4.01-8.00',
				'Sovrn Header Bidder 8.01-12.00',
				'Sovrn Header Bidder 12.01-16.00',
				'Sovrn Header Bidder 16.01-20.00',
				'Synacor Header Bidder 0.01-4.00',
				'Synacor Header Bidder 4.01-8.00',
				'Synacor Header Bidder 8.01-12.00',
				'Synacor Header Bidder 12.01-16.00',
				'Synacor Header Bidder 16.01-20.00',
				'TripleLift Header Bidder 0.01-4.00',
				'TripleLift Header Bidder 4.01-8.00',
				'TripleLift Header Bidder 8.01-12.00',
				'TripleLift Header Bidder 12.01-16.00',
				'TripleLift Header Bidder 16.01-20.00',
				'Yahoo Header Bidder 0.01-4.00',
				'Yahoo Header Bidder 4.01-8.00',
				'Yahoo Header Bidder 8.01-12.00',
				'Yahoo Header Bidder 12.01-16.00',
				'Yahoo Header Bidder 16.01-20.00',
			]),
			'revenue' => fake()->numberBetween(0, 1000000),
			'created_at' => now(),
			'updated_at' => now(),
		];
	}
}
