<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email_subject')->nullable();
            $table->string('from_email')->nullable();
            $table->longText('content')->nullable();
            $table->string('select_template')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
