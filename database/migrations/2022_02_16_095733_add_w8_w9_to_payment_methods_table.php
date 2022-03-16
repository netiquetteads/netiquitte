<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddW8W9ToPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->boolean('w8_select')->default(0)->nullable();
            $table->boolean('w9_select')->default(0)->nullable();
            $table->string('w8')->nullable();
            $table->string('w9')->nullable();
        });
    }
}
