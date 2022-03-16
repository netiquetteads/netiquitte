<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSelectFieldsToPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->dropColumn(['company_select', 'account_num_select', 'routing_select', 'explanation_select', 'custom_email_select', 'swift_select', 'account_name_select', 'paypal_email_select']);
        });
    }
}
