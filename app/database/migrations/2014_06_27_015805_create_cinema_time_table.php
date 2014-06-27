<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemaTimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('cinema_time', function($table)
        {
            $table->integer('cinema_id')->unsigned();
            $table->integer('time_id')->unsigned();
            $table->primary(['cinema_id', 'time_id']);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('cinema_time');
	}

}
