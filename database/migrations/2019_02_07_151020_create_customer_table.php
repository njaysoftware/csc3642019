<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
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

            $table->string('firstname', 64);
            $table->string('lastname', 64);
            $table->string('address', 128)->nullable();
            $table->string('city', 128)->nullable();
            $table->string('state', 32)->nullable();
            $table->string('zip', 16)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('email', 128)->nullable();
            $table->string('password', 128)->nullable();
            $table->string('billing_address', 128)->nullable();
            $table->string('billing_city', 128)->nullable();
            $table->string('billing_state', 32)->nullable();
            $table->string('billing_zip', 16)->nullable();
            $table->tinyInteger('mailing_list')->nullable();
            
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
