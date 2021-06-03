<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMailRoomsTable extends Migration
{
    public function up()
    {
        Schema::table('mail_rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4072698')->references('id')->on('teams');
        });
    }
}
