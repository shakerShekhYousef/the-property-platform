<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('makani_number');
            $table->string('p-number');
            $table->integer('floors');
            $table->float('price');
            $table->float('area');
            $table->string('address');
            $table->text('notes');
            $table->string('state');
            $table->integer('property_number');
            $table->integer('floor_number');
            $table->integer('number_of_bedrooms');
            $table->integer('number_of_bathrooms');
            $table->boolean('is_published')->default(0);
            $table->boolean('is_occupied')->default(0);
            $table->string('lat');
            $table->string('lng');
            $table->text('description');
            $table->foreignId('property_type_id');
            $table->foreignId('landlord_id');
            $table->foreignId('furniture_type_id');
            $table->foreignId('property_category_id');
            $table->foreignId('city_id');
            $table->foreignId('property_status_id');
            $table->foreignId('payment_frequency_id');
            $table->foreign('property_type_id')
                ->references('id')
                ->on('property_types')
                ->onDelete('cascade');
            $table->foreign('landlord_id')
                ->references('id')
                ->on('landlords')
                ->onDelete('cascade');
            $table->foreign('furniture_type_id')
                ->references('id')
                ->on('furniture_types')
                ->onDelete('cascade');
            $table->foreign('property_category_id')
                ->references('id')
                ->on('property_categories')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreign('payment_frequency_id')
                ->references('id')
                ->on('payment_frequencies')
                ->onDelete('cascade');
            $table->foreign('property_status_id')
                ->references('id')
                ->on('property_statuses')
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
        Schema::dropIfExists('properties');
    }
}
