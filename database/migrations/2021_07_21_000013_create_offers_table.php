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
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
