<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('affiliate_user', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_id');
            $table->foreign('affiliate_id', 'affiliate_id_fk_4426641')->references('id')->on('affiliates')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4426641')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
