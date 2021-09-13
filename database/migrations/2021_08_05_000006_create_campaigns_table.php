<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('from_email')->nullable();
            $table->longText('content')->nullable();
            $table->integer('subs')->nullable();
            $table->integer('unsubs')->nullable();
            $table->integer('opens')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
