<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTirePressuresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tire_pressures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->decimal('tire_1', 3, 1);
			$table->decimal('tire_2', 3, 1);
			$table->decimal('tire_3', 3, 1);
			$table->decimal('tire_4', 3, 1);
			$table->tinyInteger('hot')->default(0);
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
		Schema::drop('tire_pressures');
	}

}
