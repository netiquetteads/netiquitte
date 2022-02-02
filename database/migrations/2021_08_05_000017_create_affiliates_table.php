<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliatesTable extends Migration
{
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('account_status')->nullable();
            $table->string('everflow_account')->nullable();
            $table->string('account_manager_name')->nullable();
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
            $table->string('time_created')->nullable();
            $table->string('time_saved')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
