<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('mail_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('time_sent')->nullable();
            $table->integer('emails_sent')->nullable();
            $table->string('list')->nullable();
            $table->integer('opens')->nullable();
            $table->integer('unopened')->nullable();
            $table->longText('email_template')->nullable();
            $table->string('campaign')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
