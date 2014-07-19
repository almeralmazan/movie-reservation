<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedSeatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('reserved_seats', function($table)
        {
            $table->increments('id');
            $table->string('customer_name', 50);
            $table->string('customer_status', 10);
            $table->boolean('paid');
            $table->tinyInteger('seat_number');
            $table->tinyInteger('cinema_id');
            $table->tinyInteger('time_id');
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
        Schema::drop('reserved_seats');
	}

}
