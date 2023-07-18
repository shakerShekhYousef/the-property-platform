<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->date('date');
            $table->timestamp('time');
            $table->foreignId('status_id');
            $table->foreign('status_id')
                ->references('id')
                ->on('maintenance_request_statuses')
                ->onDelete('cascade');
            $table->foreignId('property_id');
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('cascade');
            $table->foreignId('maintenance_category_id');
            $table->foreign('maintenance_category_id')
                ->references('id')
                ->on('maintenance_categories')
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
        Schema::dropIfExists('maintenance_requests');
    }
}
