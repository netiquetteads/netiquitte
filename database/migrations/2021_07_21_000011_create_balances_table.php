<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('revenue', 15, 2)->nullable();
            $table->decimal('payout', 15, 2)->nullable();
            $table->decimal('profit', 15, 2)->nullable();
            $table->longText('publisher_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
