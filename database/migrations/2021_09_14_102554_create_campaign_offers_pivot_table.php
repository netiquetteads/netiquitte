<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignOffersPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_offers', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_offers');
    }
}
