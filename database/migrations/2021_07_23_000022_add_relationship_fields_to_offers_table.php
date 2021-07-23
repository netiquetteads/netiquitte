<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOffersTable extends Migration
{
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->foreign('affiliate_id', 'affiliate_fk_4427401')->references('id')->on('affiliates');
        });
    }
}
