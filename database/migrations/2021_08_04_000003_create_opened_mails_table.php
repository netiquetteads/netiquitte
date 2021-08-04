<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenedMailsTable extends Migration
{
    public function up()
    {
        Schema::create('opened_mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->time('open_time')->nullable();
            $table->date('open_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
