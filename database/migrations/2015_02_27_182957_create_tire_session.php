<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTireSession extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('track_session', function(Blueprint $table)
		{
			$table->increments('id');
			// $table->integer('user_id');
			// $table->integer('car_id');
			// $table->integer('track_id');
			// $table->integer('cold_pressure_id');
			// $table->integer('hot_pressure_id');
			$table->integer('heat_cycles');
			$table->string('tire');
			$table->string('tire_size');
			$table->decimal('ambient_temp', 4, 1);
			$table->decimal('best_lap_time', 4, 1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('track_session');
	}

}
