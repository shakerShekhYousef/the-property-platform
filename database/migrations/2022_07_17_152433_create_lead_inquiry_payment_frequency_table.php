<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadInquiryPaymentFrequencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('lead_inquiry_payment_frequency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lead_inquiry_id');
            $table->foreignId('payment_frequency_id');
            $table->foreign('lead_inquiry_id')
                ->references('id')
                ->on('lead_inquiries')
                ->onDelete('cascade');
            $table->foreign('payment_frequency_id')
                ->references('id')
                ->on('payment_frequencies')
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
        Schema::dropIfExists('lead_inquiry_payment_frequency');
    }
}
