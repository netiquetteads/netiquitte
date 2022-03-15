<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToPaymentMethodTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_method_type', function (Blueprint $table) {
            $table->boolean('account_name_select')->default(0)->nullable();
            $table->boolean('paypal_email_select')->default(0)->nullable();
            $table->boolean('account_num_select')->default(0)->nullable();
            $table->boolean('routing_select')->default(0)->nullable();
            $table->boolean('notes_select')->default(0)->nullable();
            $table->boolean('custom_email_select')->default(0)->nullable();
            $table->boolean('swift_select')->default(0)->nullable();
        });
    }
}
