<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('customer_ID')->nullable();
            $table->unsignedInteger('product_ID')->nullable();
            $table->boolean('product_purchased')->nullable();
            $table->datetime('date_viewed')->nullable();
            $table->datetime('date_purchased')->nullable();
    
            $table->index('customer_ID');
            $table->index('product_ID');
            
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
