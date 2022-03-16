<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserAlertTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_user_alert')->delete();
    }
}
