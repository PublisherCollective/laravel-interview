<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$name = fake()->company();
		$domain = fake()->domainName();

		return [
			'name' => Str::headline($name),
			'slug' => Str::slug($name),
			'url' => sprintf('%s://%s/',
				fake()->randomElement(['https', 'https', 'https', 'https', 'http']),
				$domain
			),
			'description' => fake()->bs(),
			'commission_rate' => fake()->randomElement([30, 50, 60, 75, 80, 90]),
			'is_active' => fake()->randomElement([true, true, true, false]),
		];
	}
}
