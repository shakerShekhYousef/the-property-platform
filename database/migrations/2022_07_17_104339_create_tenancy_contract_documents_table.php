<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenancyContractDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('tenancy_contract_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('tenancy_contract_id');
            $table->foreign('tenancy_contract_id')
                ->references('id')
                ->on('tenancy_contracts')
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
        Schema::dropIfExists('tenancy_contract_documents');
    }
}
