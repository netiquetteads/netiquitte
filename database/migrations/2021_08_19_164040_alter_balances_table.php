<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balances', function (Blueprint $table) {
            $table->string('affiliate')->nullable();
            $table->unsignedBigInteger('affiliate_id');
            $table->foreign('affiliate_id')->references('id')->on('affiliates')->onDelete('cascade');
            $table->string('accounting_year')->nullable();
            $table->string('accounting_month')->nullable();
            $table->string('monthly_status')->nullable();
            $table->string('ach_name')->nullable();
            $table->string('ach_account')->nullable();
            $table->string('ach_routing')->nullable();
            $table->string('wire_name')->nullable();
            $table->string('wire_account')->nullable();
            $table->string('wire_routing')->nullable();
            $table->string('wire_swift')->nullable();
            $table->string('paypal')->nullable();
            $table->string('payment_type')->nullable();
        });
    }
}
