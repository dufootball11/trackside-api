<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SessionPressuresPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tire_pressure_track_session', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('track_session_id')->unsigned()->index();
			$table->foreign('track_session_id')->references('id')->on('track_session')->onDelete('cascade');
			$table->integer('tire_pressure_id')->unsigned()->index();
			$table->foreign('tire_pressure_id')->references('id')->on('tire_pressures')->onDelete('cascade');
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
		Schema::drop('tire_pressure_track_session');
	}

}
