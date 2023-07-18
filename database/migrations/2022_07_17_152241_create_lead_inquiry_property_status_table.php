<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadInquiryPropertyStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('lead_inquiry_property_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_inquiry_id');
            $table->foreignId('property_status_id');
            $table->foreign('lead_inquiry_id')
                ->references('id')
                ->on('lead_inquiries')
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
        Schema::dropIfExists('lead_inquiry_property_status');
    }
}
