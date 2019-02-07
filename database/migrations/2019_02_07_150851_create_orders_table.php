<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->unsignedInteger('customer_ID')->nullable();
            $table->string('order_number', 64);
            $table->string('shipping_address', 128)->nullable();
            $table->string('shipping_city', 128)->nullable();
            $table->string('shipping_state', 32)->nullable();
            $table->string('shipping_zip', 16)->nullable();
            $table->string('payment_method', 128)->nullable();
            $table->datetime('order_date')->nullable();
    
            $table->index('customer_ID');
            
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
        Schema::dropIfExists('children');
    }
}
