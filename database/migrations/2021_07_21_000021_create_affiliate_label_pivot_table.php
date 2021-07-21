<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateLabelPivotTable extends Migration
{
    public function up()
    {
        Schema::create('affiliate_label', function (Blueprint $table) {
            $table->unsignedBigInteger('affiliate_id');
            $table->foreign('affiliate_id', 'affiliate_id_fk_4426657')->references('id')->on('affiliates')->onDelete('cascade');
            $table->unsignedBigInteger('label_id');
            $table->foreign('label_id', 'label_id_fk_4426657')->references('id')->on('labels')->onDelete('cascade');
        });
    }
}
