<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamUserAlertPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user_alert', function (Blueprint $table) {
            $table->unsignedBigInteger('user_alert_id');
            $table->foreign('user_alert_id', 'user_alert_id_fk_44270591')->references('id')->on('user_alerts')->onDelete('cascade');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id', 'team_id_fk_44270591')->references('id')->on('teams')->onDelete('cascade');
            $table->boolean('read')->default(0);
        });
    }
}
