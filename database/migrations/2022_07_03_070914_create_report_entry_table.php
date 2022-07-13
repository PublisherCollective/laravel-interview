<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_entries', function (Blueprint $table) {
			$table->id();
			$table->integer('unit_id');
			$table->integer('order_id');
			$table->text('advertiser');
			$table->integer('revenue')->default(0);
			$table->timestamps();

			$table->unique(['unit_id', 'order_id', 'created_at']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('report_entries');
	}
};
