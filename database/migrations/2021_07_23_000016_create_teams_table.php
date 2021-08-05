<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD:database/migrations/2021_07_23_000016_create_teams_table.php
class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
=======
class CreateMailRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('mail_rooms', function (Blueprint $table) {
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations):database/migrations/2021_06_23_000013_create_mail_rooms_table.php
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
