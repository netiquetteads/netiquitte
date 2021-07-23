<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBalancesTable extends Migration
{
    public function up()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_4427425')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('payment_status_id')->nullable();
            $table->foreign('payment_status_id', 'payment_status_fk_4427426')->references('id')->on('payment_statuses');
        });
    }
}
