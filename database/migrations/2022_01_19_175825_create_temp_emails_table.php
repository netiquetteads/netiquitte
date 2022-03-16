<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_emails', function (Blueprint $table) {
            $table->id();
            $table->string('from_name')->nullable();
            $table->string('email')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('email_name')->nullable();
            $table->string('email_from')->nullable();
            $table->longText('email_body')->nullable();
            $table->string('sent_to')->nullable();
            $table->string('email_status')->nullable();
            $table->string('email_opened')->nullable();
            $table->date('email_open_date')->nullable();
            $table->time('email_open_time')->nullable();
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_4427046101')->references('id')->on('campaigns');
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
        Schema::dropIfExists('temp_emails');
    }
}
