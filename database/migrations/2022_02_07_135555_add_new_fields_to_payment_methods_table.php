<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->boolean('account_name_select')->default(0)->nullable();
            $table->boolean('paypal_email_select')->default(0)->nullable();
            $table->dropColumn(['name_select', 'name']);
        });
    }
}
