<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SessionCarPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('car_track_session', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('track_session_id')->unsigned()->index();
			$table->foreign('track_session_id')->references('id')->on('track_session')->onDelete('cascade');
			$table->integer('car_id')->unsigned()->index();
			$table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
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
		Schema::drop('car_track_session');
	}

}
