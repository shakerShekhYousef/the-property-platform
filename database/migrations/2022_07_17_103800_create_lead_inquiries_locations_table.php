<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadInquiriesLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('lead_inquiries_locations', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('lat');
            $table->string('lng');
            $table->foreignId('leads_inquiries_id');
            $table->foreign('leads_inquiries_id')
                ->references('id')
                ->on('leads_inquiries')
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
        Schema::dropIfExists('lead_inquiries_locations');
    }
}
