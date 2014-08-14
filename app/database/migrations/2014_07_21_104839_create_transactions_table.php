<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('transactions', function($table)
        {
            $table->increments('id');
            $table->string('transaction_number')->default('');
            $table->integer('receipt_number');
            $table->tinyInteger('tickets_bought');
            $table->integer('burger_bought');
            $table->integer('fries_bought');
            $table->integer('soda_bought');
            $table->decimal('total', 8, 2);
            $table->boolean('paid_status');
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
        Schema::drop('transactions');
	}

}
