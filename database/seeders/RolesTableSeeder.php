<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 => [
                'id' => 1,
                'title' => 'Admin',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            1 => [
                'id' => 2,
                'title' => 'User',
                'created_at' => null,
                'updated_at' => null,
                'deleted_at' => null,
            ],
            2 => [
                'id' => 3,
                'title' => 'Neti Associate',
                'created_at' => '2022-03-15 13:36:17',
                'updated_at' => '2022-03-15 13:36:17',
                'deleted_at' => null,
            ],
        ]);
    }
}
