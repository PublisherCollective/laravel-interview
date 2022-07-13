<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEntry extends Model
{
	use HasFactory;

	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @see Illuminate\Database\Eloquent\Concerns\GuardsAttributes
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @see Illuminate\Database\Eloquent\Concerns\HasAttributes
	 * @var array
	 */
	protected $casts = [
		'created_at' => 'datetime:Y-m-d H:i:s',
		'updated_at' => 'datetime:Y-m-d H:i:s',
	];
}
