<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAlertsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_alerts')->delete();

        \DB::table('user_alerts')->insert([
            0 => [
                'id' => 1,
                'alert_text' => 'THIS IS AN EXAMPLE OF A USER ALERT OWEN. AT THE MOMENT IS SENDS TO ROLES BUT I ADD USERS SO YOU CAN SEND TO EVERYONE WITH A ROLE OR TO A USER',
                'alert_link' => null,
                'created_at' => '2022-02-23 17:04:25',
                'updated_at' => '2022-02-23 17:04:25',
            ],
        ]);
    }
}
