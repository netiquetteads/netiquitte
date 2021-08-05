<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBalancesTable extends Migration
{
    public function up()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->unsignedBigInteger('company_name_id')->nullable();
            $table->foreign('company_name_id', 'company_name_fk_4234470')->references('id')->on('accounts');
            $table->unsignedBigInteger('payment_status_id')->nullable();
            $table->foreign('payment_status_id', 'payment_status_fk_4234471')->references('id')->on('payment_statuses');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_4234472')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4234473')->references('id')->on('teams');
        });
    }
}
