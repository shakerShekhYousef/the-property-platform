<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_company')->default(0);
            $table->string('company_name')->nullable();
            $table->string('trade_licence');
            $table->date('trade_licence_expiry');
            $table->string('TRN');
            $table->string('name');
            $table->date('date_of_birthday');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('mobile_number');
            $table->string('additional_mobile_number');
            $table->string('national_number');
            $table->string('national_id_expiry');
            $table->string('passport_number');
            $table->date('passport_expiry');
            $table->string('visa_state');
            $table->string('nationality');
            $table->string('state');
            $table->string('address1');
            $table->string('address2');
            $table->string('postcode');
            $table->string('national_id_photo');
            $table->string('passport_photo');
            $table->string('visa_photo');
            $table->foreignId('city_id');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreignId('property_id');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('cascade');
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
        Schema::dropIfExists('tenants');
    }
}
