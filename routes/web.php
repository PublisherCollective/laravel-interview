<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Intro page
Route::get('/', function (Request $request) {
	return view('welcome');
});

// Routes for each dashboard view
Route::get('/dashboard/units', [DashboardController::class, 'units'])->name('units');
Route::get('/dashboard/days', [DashboardController::class, 'days'])->name('days');
Route::get('/dashboard/advertisers', [DashboardController::class, 'advertisers'])->name('advertisers');

// Dummy API endpoint - pretend this isn't here 👀
Route::get('/api', [APIController::class, 'fetchReport'])->name('api');
