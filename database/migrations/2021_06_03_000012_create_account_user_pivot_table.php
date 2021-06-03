<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('account_user', function (Blueprint $table) {
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id', 'account_id_fk_4072480')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_4072480')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
