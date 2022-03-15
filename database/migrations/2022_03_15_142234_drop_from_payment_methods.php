<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropFromPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('payment_methods', 'w8'))
        {
            Schema::table('payment_methods', function (Blueprint $table) {
                $table->dropColumn('w8');
            });
        }
        if (Schema::hasColumn('payment_methods', 'w9'))
        {
            Schema::table('payment_methods', function (Blueprint $table) {
                $table->dropColumn('w9');
            });
        }
    }
}
