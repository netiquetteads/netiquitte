<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_container', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('time_year')->nullable();
            $table->string('time_month')->nullable();
            $table->string('affiliate')->nullable();
            $table->unsignedBigInteger('affiliate_id');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
            $table->string('offer')->nullable();
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->decimal('revenue', 15, 2)->nullable();
            $table->decimal('payout', 15, 2)->nullable();
            $table->decimal('profit', 15, 2)->nullable();
            $table->string('monthly_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balance_container');
    }
}
