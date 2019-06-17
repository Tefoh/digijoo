<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateNextpayGatewayTransactionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nextpay_gateway_transactions', function (Blueprint $table) {
			$table->engine = "innoDB";
			$table->increments('id');
			$table->unsignedInteger('user_id')->nullable();
			$table->enum('gateway', [
                config('payment.gateway'),
			]);
            $table->integer('status')->default(-1);
            $table->integer('discount')->nullable();
            $table->integer('discount_code')->nullable();
            $table->integer('tax')->nullable();
            $table->integer('total')->nullable();
			$table->decimal('price', 15, 2)->nullable();
			$table->string('trans_id', 50)->nullable();
			$table->string('card_number', 50)->nullable();
			$table->string('ip', 20)->nullable();
			$table->string('error')->nullable();
			$table->timestamp('payment_date')->nullable();
            $table->unsignedBigInteger('id_commodity')->nullable();
			$table->nullableTimestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nextpay_gateway_transactions');
	}
}
