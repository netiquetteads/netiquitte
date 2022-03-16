<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_user')->delete();

        \DB::table('role_user')->insert([
            0 => [
                'user_id' => 1,
                'role_id' => 1,
            ],
            1 => [
                'user_id' => 2,
                'role_id' => 1,
            ],
            2 => [
                'user_id' => 3,
                'role_id' => 1,
            ],
            3 => [
                'user_id' => 4,
                'role_id' => 1,
            ],
        ]);
    }
}
