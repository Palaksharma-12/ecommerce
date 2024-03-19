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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
           
               // Define foreign key for productId
        $table->unsignedBigInteger('product_id')->nullable();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        
        // Define foreign key for customerId
        $table->unsignedBigInteger('customer_id')->nullable();
        $table->foreign('customer_id')->references('id')->on('users')->onDelete('set null');

            $table->integer('quantity')->default(0);
           
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
        Schema::dropIfExists('carts');
    }
};
