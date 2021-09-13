<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCampaignsTable extends Migration
{
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_offer_id')->nullable();
            $table->foreign('campaign_offer_id', 'campaign_offer_fk_4538417')->references('id')->on('offers');
            $table->unsignedBigInteger('selected_template_id')->nullable();
            $table->foreign('selected_template_id', 'selected_template_fk_4538418')->references('id')->on('templates');
        });
    }
}
