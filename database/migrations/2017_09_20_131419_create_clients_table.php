<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('nome')->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 160)->nullable();
            $table->string('bairro', 160)->nullable();
            $table->string('numero', 60)->nullable();
            $table->string('complemento', 160)->nullable();
            $table->string('cidade', 120)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
