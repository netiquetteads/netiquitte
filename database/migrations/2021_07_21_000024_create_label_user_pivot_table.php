<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('label_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4426732')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id', 'label_id_fk_4426732')->references('id')->on('labels')->onDelete('cascade');
        });
    }
}
