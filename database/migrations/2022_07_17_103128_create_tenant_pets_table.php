<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantPetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tenant_pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('pet_type_id');
            $table->foreignId('tenant_id');
            $table->foreign('pet_type_id')
                ->references('id')
                ->on('pet_types')
                ->onDelete('cascade');
            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
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
        Schema::dropIfExists('tenant_pets');
    }
}
