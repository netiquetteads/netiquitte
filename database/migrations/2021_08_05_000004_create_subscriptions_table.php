<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('subscribed_date')->nullable();
            $table->time('subscribed_time')->nullable();
            $table->date('unsubscribed_date')->nullable();
            $table->time('unsubscribed_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
