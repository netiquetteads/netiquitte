<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('address_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4426750')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id', 'address_id_fk_4426750')->references('id')->on('addresses')->onDelete('cascade');
        });
    }
}
