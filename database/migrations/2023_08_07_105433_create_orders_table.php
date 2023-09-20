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
            $table->string('date');
            $table->unsignedBigInteger('sales_id'); 
            $table->unsignedBigInteger('client_id');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            // foreign key
            $table->foreign('sales_id')->references('id')->on('sales_persons');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('orders');
    }
}
