<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('content_id');
            $table->string('img');
            $table->string('title');
            $table->string('text');
            $table->string('price')->default('5000');
            $table->string('quantity');
            $table->string('sort')->default('0');
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
        Schema::dropIfExists('content_products');
    }
}
