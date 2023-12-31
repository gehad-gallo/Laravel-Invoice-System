<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('phone'); 
            $table->boolean('is_active')->default(1); 
            $table->string('api_token')->null();            
            $table->unsignedBigInteger('sales_id'); 


             // foreign key
            $table->foreign('sales_id')->references('id')->on('sales_persons');

        });
    }
    



    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('clients');
    }
}
