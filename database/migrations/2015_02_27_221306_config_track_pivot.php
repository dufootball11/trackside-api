<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigTrackPivot extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('track_track_config', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('track_config_id')->unsigned()->index();
			$table->foreign('track_config_id')->references('id')->on('track_config')->onDelete('cascade');
			$table->integer('track_id')->unsigned()->index();
			$table->foreign('track_id')->references('id')->on('track')->onDelete('cascade');
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
		Schema::drop('track_track_config');
	}

}
