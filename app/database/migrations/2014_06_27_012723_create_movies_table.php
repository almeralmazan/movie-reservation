<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('movies', function($table)
        {
            $table->increments('id');
            $table->string('title', 100)->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('image')->nullable(false);
            $table->string('trailer_url', 150)->nullable(false);
            $table->date('showing_date')->default('0000-00-00');
            $table->integer('cinema_id')->default(0);
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
        Schema::drop('movies');
	}

}
