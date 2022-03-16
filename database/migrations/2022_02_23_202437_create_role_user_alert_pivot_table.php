<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserAlertPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user_alert', function (Blueprint $table) {
            $table->unsignedBigInteger('user_alert_id');
            $table->foreign('user_alert_id', 'user_alert_id_fk_44270590')->references('id')->on('user_alerts')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_44270590')->references('id')->on('roles')->onDelete('cascade');
            $table->boolean('read')->default(0);
        });
    }
}
