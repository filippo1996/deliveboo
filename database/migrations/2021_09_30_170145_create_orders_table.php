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
            $table->id();
            $table->string('name', 45);
            $table->string('lastname', 45);
            $table->string('email', 150);
            $table->float('price', 5,2);
            $table->char('phone_number', 10);
            $table->string('address', 80);
            $table->integer('house_number');
            $table->char('postal_code', 5);
            $table->string('city', 45);
            $table->string('country', 20);
            $table->timestamps();
        });

        Schema::create('order_user', function (Blueprint $table) {

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');

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
