<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'slug',
		'url',
		'description',
		'is_active',
	];

	public function owners()
	{
		return $this->belongsToMany(User::class);
	}

	public function units()
	{
		return $this->hasMany(Unit::class);
	}
}
