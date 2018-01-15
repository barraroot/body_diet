<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisccountRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disccount_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->notnull();
            $table->datetime('valido')->notnull();
            $table->decimal('valor', 5, 2)->nullable();
            $table->decimal('diccount_frete', 5, 2)->nullable();
            $table->decimal('diccount_order', 5, 2)->nullable();
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
        Schema::dropIfExists('disccount_rules');
    }
}
