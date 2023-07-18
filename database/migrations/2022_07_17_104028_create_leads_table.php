<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('additional_mobile_number')->nullable();
            $table->foreignId('campaign_id')->nullable();
            $table->foreignId('campaign_utm_source_id')->nullable();
            $table->foreignId('campaign_utm_medium_id')->nullable();
            $table->foreignId('campaign_utm_campaign_id')->nullable();
            $table->unsignedBigInteger('entry_user_id');
            $table->date('creation_date');
            $table->boolean('has_comment')->default(false);
            $table->text('comment')->nullable();
            $table->string('passportId')->nullable();
            $table->date('passport_expiry')->nullable();
            $table->string('emiratesId')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('lead_source_id');
            $table->foreignId('status_id');
            $table->foreignId('city_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('lead_source_id')
                ->references('id')
                ->on('lead_sources')
                ->onDelete('cascade');
            $table->foreign('status_id')
                ->references('id')
                ->on('lead_statuses')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
            $table->foreign('project_id')
                ->references('id')
                ->on('lead_projects')
                ->onDelete('cascade');
            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns')
                ->onDelete('cascade');
            $table->foreign('campaign_utm_source_id')
                ->references('id')
                ->on('campaign_utm_sources')
                ->onDelete('cascade');
            $table->foreign('campaign_utm_medium_id')
                ->references('id')
                ->on('campaign_utm_mediums')
                ->onDelete('cascade');
            $table->foreign('campaign_utm_campaign_id')
                ->references('id')
                ->on('campaign_utm_campaigns')
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
        Schema::dropIfExists('leads');
    }
}
