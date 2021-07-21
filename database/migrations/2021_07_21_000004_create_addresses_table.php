<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('region_code')->nullable();
            $table->string('country_code')->nullable();
            $table->integer('zip_postal_code')->nullable();
            $table->integer('addressid')->nullable();
            $table->integer('networkid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
