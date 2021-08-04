<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMailHistoriesTable extends Migration
{
    public function up()
    {
        Schema::table('mail_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('posted_campaign_id')->nullable();
            $table->foreign('posted_campaign_id', 'posted_campaign_fk_4537597')->references('id')->on('templates');
        });
    }
}
