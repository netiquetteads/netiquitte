<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisersTable extends Migration
{
    public function up()
    {
        Schema::create('advertisers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('account_status')->nullable();
            $table->string('everflow_account')->nullable();
            $table->string('account_manager_name')->nullable();
            $table->string('sales_manager_name')->nullable();
            $table->string('account_executive_name')->nullable();
            $table->float('balance', 15, 2)->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('network_country_code')->nullable();
            $table->string('global_tracking_domain_url')->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('today_revenue')->nullable();
            $table->integer('network_affiliateid')->nullable();
            $table->integer('account_executiveid')->nullable();
            $table->integer('account_managerid')->nullable();
            $table->integer('networkid')->nullable();
            $table->integer('network_employeeid')->nullable();
            $table->longText('internal_notes')->nullable();
            $table->boolean('is_contact_address_enabled')->default(0)->nullable();
            $table->integer('sales_managerid')->nullable();
            $table->boolean('is_expose_publisher_reporting_data')->default(0)->nullable();
            $table->string('platform_name')->nullable();
            $table->string('platform_url')->nullable();
            $table->string('platform_username')->nullable();
            $table->string('accounting_contact_email')->nullable();
            $table->string('offer_id_macro')->nullable();
            $table->string('affiliate_id_macro')->nullable();
            $table->string('attribution_method')->nullable();
            $table->string('email_attribution_method')->nullable();
            $table->integer('network_advertiserid')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
