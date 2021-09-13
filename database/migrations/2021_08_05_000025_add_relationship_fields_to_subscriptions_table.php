<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('subscriber_id')->nullable();
            $table->foreign('subscriber_id', 'subscriber_fk_4538776')->references('id')->on('subscribers');
            $table->unsignedBigInteger('offer_subscription_id')->nullable();
            $table->foreign('offer_subscription_id', 'offer_subscription_fk_4538777')->references('id')->on('offers');
        });
    }
}
