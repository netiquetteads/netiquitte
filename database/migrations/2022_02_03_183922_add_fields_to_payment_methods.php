<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->longText('explanation')->nullable();
            $table->boolean('name_select')->default(0)->nullable();
            $table->boolean('company_select')->default(0)->nullable();
            $table->boolean('account_num_select')->default(0)->nullable();
            $table->boolean('routing_select')->default(0)->nullable();
            $table->boolean('explanation_select')->default(0)->nullable();
            $table->string('custom_email')->nullable();
            $table->boolean('custom_email_select')->default(0)->nullable();
            $table->boolean('swift_select')->default(0)->nullable();
        });
    }
}
