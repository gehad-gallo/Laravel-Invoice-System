<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesSupportPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sales_support_persons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();            
            $table->string('api_token')->null();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {      
     Schema::drop('sales_support_persons');
    }
}
