<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('preview_url')->nullable();
            $table->string('source')->nullable();
            $table->decimal('payout', 15, 2)->nullable();
            $table->decimal('revenue', 15, 2)->nullable();
            $table->string('offer_status')->nullable();
            $table->decimal('margin', 15, 2)->nullable();
            $table->integer('network_offer')->nullable();
            $table->integer('network')->nullable();
            $table->string('optimized_thumbnail_url')->nullable();
            $table->string('thumbnail_url')->nullable();
            $table->string('visibility')->nullable();
            $table->string('network_advertiser_name')->nullable();
            $table->string('category')->nullable();
            $table->integer('network_offer_group')->nullable();
            $table->time('time_created')->nullable();
            $table->time('time_saved')->nullable();
            $table->decimal('today_revenue', 15, 2)->nullable();
            $table->string('destination_url')->nullable();
            $table->integer('today_clicks')->nullable();
            $table->string('revenue_type')->nullable();
            $table->string('payout_type')->nullable();
            $table->float('today_payout_amount', 15, 2)->nullable();
            $table->decimal('today_revenue_amount', 15, 2)->nullable();
            $table->integer('payout_amount')->nullable();
            $table->integer('revenue_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
