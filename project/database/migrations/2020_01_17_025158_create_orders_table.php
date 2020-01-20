<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no');
            $table->string('name');
            $table->string('id_number');
            $table->string('phone');
            $table->string('date');
            $table->string('email');
            $table->string('passport_name');
            $table->string('gender');
            $table->string('total_price');
            $table->longText('remark');
            $table->string('quantity')->default('1');
            $table->string('status')->default('NewOrder');
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
        Schema::dropIfExists('orders');
    }
}
