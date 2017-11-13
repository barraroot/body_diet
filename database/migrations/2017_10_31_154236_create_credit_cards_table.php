<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->nullable()->unsigned();
            $table->string('billingAddressCity')->nullable();
            $table->string('billingAddressComplement')->nullable();
            $table->string('billingAddressCountry')->nullable();
            $table->string('billingAddressDistrict')->nullable();
            $table->string('billingAddressNumber')->nullable();
            $table->string('billingAddressPostalCode')->nullable();
            $table->string('billingAddressState')->nullable();
            $table->string('billingAddressStreet')->nullable();
            $table->string('creditCardHolderAreaCode')->nullable();
            $table->string('creditCardHolderBirthDate')->nullable();
            $table->string('creditCardHolderCPF')->nullable();
            $table->string('creditCardHolderName')->nullable();
            $table->string('creditCardHolderPhone')->nullable();
            $table->string('cardNumber')->nullable();
            $table->string('ccv')->nullable();
            $table->string('mes')->nullable();
            $table->string('ano')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('credit_cards');
    }
}
