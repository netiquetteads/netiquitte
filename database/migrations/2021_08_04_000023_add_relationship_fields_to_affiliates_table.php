<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::table('affiliates', function (Blueprint $table) {
            // $table->unsignedBigInteger('account_status_id')->nullable();
            // $table->foreign('account_status_id', 'account_status_fk_4427090')->references('id')->on('account_statuses');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4427084')->references('id')->on('teams');
        });
    }
}
