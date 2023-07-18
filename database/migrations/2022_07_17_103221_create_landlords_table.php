<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('landlords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('additional_mobile_number')->nullable();
            $table->string('tax_registration_number');
            $table->string('national_number');
            $table->string('national_id_expiry');
            $table->string('passport_number');
            $table->string('visa_state');
            $table->string('name_of_contact');
            $table->string('email_of_contact');
            $table->string('phone_of_contact');
            $table->string('bank_name');
            $table->string('bank_address');
            $table->string('IBAN');
            $table->string('SWIFT');
            $table->date('passport_expiry');
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
        Schema::dropIfExists('landlords');
    }
}
