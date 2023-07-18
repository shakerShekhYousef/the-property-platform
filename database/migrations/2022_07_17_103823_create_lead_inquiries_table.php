<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('lead_inquiries', function (Blueprint $table) {
            $table->id();
            $table->float('min_price')->nullable();
            $table->float('max_price')->nullable();
            $table->float('min_area')->nullable();
            $table->float('max_area')->nullable();
            $table->integer('min_number_of_bedrooms')->nullable();
            $table->integer('max_number_of_bedrooms')->nullable();
            $table->foreignId('lead_id');
            $table->foreign('lead_id')
                ->references('id')
                ->on('leads')
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
        Schema::dropIfExists('lead_inquiries');
    }
}
