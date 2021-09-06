<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('EmailAddress')->nullable();
            $table->string('Company')->nullable();
            $table->string('PlatformUserID')->nullable();
            $table->string('UserPassword')->nullable();
            $table->string('AccountStatus')->nullable();
            $table->string('Hash')->nullable();
            $table->string('LastAccessDate')->nullable();
            $table->string('LastAccessIP')->nullable();
            $table->string('IPAddress')->nullable();
            $table->string('AccountType')->nullable();
            $table->string('BillingFrequency')->nullable();
            $table->string('SubscribedStatus')->nullable();
            $table->string('UnsubscribeDate')->nullable();
            $table->string('UnsubscribeTime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
