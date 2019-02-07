<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            
            
            $table->string('description', 1024)->nullable();
            $table->float('price')->default(0);
            $table->string('picture', 128)->nullable();
            $table->string('sku', 32)->nullable();
            $table->integer('qty_available')->nullable();
            $table->datetime('date_added')->nullable();
            $table->unsignedInteger('supplier_ID')->nullable();
            $table->string('supplier_SKU', 32)->nullable();
            $table->float('cost')->nullable();
    
            $table->index('supplier_ID');

            
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
        Schema::dropIfExists('products');
    }
}
