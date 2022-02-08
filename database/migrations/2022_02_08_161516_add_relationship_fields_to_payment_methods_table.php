<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method_type_id')->nullable();
            $table->foreign('payment_method_type_id', 'payment_method_type_id_fk_307836900')->references('id')->on('payment_method_type');
            $table->unsignedBigInteger('affiliate_id')->nullable();
            $table->foreign('affiliate_id', 'affiliate_id_fk_30783690011')->references('id')->on('affiliates');
        });
    }
}
