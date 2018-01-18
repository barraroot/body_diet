<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('client_id')->nullable()->unsigned();
            $table->string('status', 60)->nullable()->default('Pendente');
            $table->decimal('total_produtos', 5, 2)->nullable()->unsigned();
            $table->decimal('frete', 5, 2)->nullable()->unsigned();
            $table->decimal('total', 5, 2)->nullable()->unsigned();
            $table->integer('pontos')->nullable()->unsigned();
            $table->text('obs')->nullable();
            $table->string('email', 200)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 160)->nullable();
            $table->string('bairro', 160)->nullable();
            $table->string('numero', 60)->nullable();
            $table->string('complemento', 160)->nullable();
            $table->string('cidade', 120)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('telefone', 20)->nullable();           
            $table->timestamps();
            //$table->foreign('client_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
