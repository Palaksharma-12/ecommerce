<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('orderId')->change();
            $table->foreign('orderId')->references('id')->on('orders'); 
        });
    }

    /**
     * Reverse the migration
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders_items', function (Blueprint $table) {
            //
            $table->dropForeign(['orderId']); 

            $table->dropForeign(['orderId']);  
        });
    }
};
