<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserUserAlertTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_user_alert')->delete();

        \DB::table('user_user_alert')->insert([
            0 => [
                'user_alert_id' => 1,
                'user_id' => 1,
                'read' => 1,
            ],
        ]);
    }
}
