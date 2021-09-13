<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToResultsTrackingsTable extends Migration
{
    public function up()
    {
        Schema::table('results_trackings', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->nullable();
            $table->foreign('campaign_id', 'campaign_fk_4538742')->references('id')->on('campaigns');
            $table->unsignedBigInteger('subscriber_id')->nullable();
            $table->foreign('subscriber_id', 'subscriber_fk_4538786')->references('id')->on('subscribers');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->foreign('subscription_id', 'subscription_fk_4538787')->references('id')->on('subscriptions');
        });
    }
}
