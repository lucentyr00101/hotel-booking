<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->string('birthday');
            $table->string('contact_number');
            $table->string('mailing_address');
            $table->string('email_address');
            $table->dateTime('datetime_of_arrival');
            $table->dateTime('datetime_of_departure');
            $table->integer('number_of_guest');
            $table->string('type_of_guest');
            $table->string('deposit')->nullable();
            $table->string('mode_of_payment');
            $table->string('credit_card_type')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
