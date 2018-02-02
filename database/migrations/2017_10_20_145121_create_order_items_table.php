<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->decimal('preco', 13, 2)->nullable()->unsigned();
            $table->integer('qtde')->nullable()->unsigned();
            $table->decimal('total', 13, 2)->nullable()->unsigned();
            $table->decimal('pontos', 13, 2)->nullable()->unsigned();
            $table->timestamps();
            //$table->foreign('order_id')->references('id')->on('orders');
            //$table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
