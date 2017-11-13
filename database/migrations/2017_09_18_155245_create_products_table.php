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
            $table->string('title', 100);
            $table->string('description');
            $table->decimal('price', 11,2);
            $table->decimal('vd')->unsigned();
            $table->decimal('kcal')->unsigned();
            $table->decimal('kcal_grama')->unsigned();
            $table->decimal('carboidrato')->unsigned();
            $table->decimal('carboidrato_grama')->unsigned();
            $table->decimal('proteina')->unsigned();
            $table->decimal('proteina_grama')->unsigned();
            $table->decimal('gorduras')->unsigned();
            $table->decimal('gorduras_grama')->unsigned();
            $table->decimal('liquido')->unsigned();
            $table->decimal('liquido_grama')->unsigned();            
            $table->decimal('sodio')->unsigned();
            $table->decimal('sodio_grama')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('pontos')->unsigned()->default(0);
            $table->boolean('emagrecimento')->nullable();
            $table->boolean('gluten')->nullable();
            $table->boolean('lactose')->nullable();
            $table->boolean('show_ini')->nullable();
            $table->string('img', 100)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
