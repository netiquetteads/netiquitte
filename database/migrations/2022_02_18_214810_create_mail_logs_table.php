<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_mail_logs', function (Blueprint $table) {
            $table->id();
            $table->string('from_name')->nullable();
            $table->string('email')->nullable();
            $table->string('email_subject')->nullable();
            $table->longText('email_body')->nullable();
            $table->string('email_opened')->nullable();
            $table->date('email_open_date')->nullable();
            $table->time('email_open_time')->nullable();
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->foreign('affiliate_id', 'affiliate_fk_442704610100')->references('id')->on('affiliates');
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
        Schema::dropIfExists('mail_logs');
    }
}
