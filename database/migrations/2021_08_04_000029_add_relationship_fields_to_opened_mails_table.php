<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOpenedMailsTable extends Migration
{
    public function up()
    {
        Schema::table('opened_mails', function (Blueprint $table) {
            $table->unsignedBigInteger('campaige_id')->nullable();
            $table->foreign('campaige_id', 'campaige_fk_4537619')->references('id')->on('mail_histories');
        });
    }
}
