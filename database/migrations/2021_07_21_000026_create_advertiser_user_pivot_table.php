<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertiserUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('advertiser_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4426751')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('advertiser_id');
            $table->foreign('advertiser_id', 'advertiser_id_fk_4426751')->references('id')->on('advertisers')->onDelete('cascade');
        });
    }
}
