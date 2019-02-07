<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255);
            $table->string('address', 128)->nullable();
            $table->string('city', 128)->nullable();
            $table->string('state', 32)->nullable();
            $table->string('zip', 16)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('contact_name', 128)->nullable();
            $table->string('web_Site', 255)->nullable();
            
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
