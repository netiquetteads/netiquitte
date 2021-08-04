<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTemplatesTable extends Migration
{
    public function up()
    {
        Schema::table('templates', function (Blueprint $table) {
            $table->unsignedBigInteger('offer_selection_id')->nullable();
            $table->foreign('offer_selection_id', 'offer_selection_fk_4537501')->references('id')->on('offers');
        });
    }
}
