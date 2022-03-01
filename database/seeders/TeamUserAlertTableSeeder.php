<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamUserAlertTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('team_user_alert')->delete();
    }
}
