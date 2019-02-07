<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('order_ID')->nullable();
            $table->unsignedInteger('product_ID')->nullable();
            $table->unsignedInteger('fulfilled_by_ID')->nullable();
            $table->float('price')->nullable();
            $table->float('quantity')->nullable();
            $table->datetime('ship_date')->nullable();
            
            $table->index('order_ID');
            $table->index('product_ID');
            $table->index('fulfilled_by_ID');
            
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
