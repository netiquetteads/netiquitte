<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('teams')->delete();

        \DB::table('teams')->insert([
            0 => [
                'id' => 1,
                'name' => 'goba@gmail.com',
                'created_at' => '2021-12-19 16:26:12',
                'updated_at' => '2021-12-19 16:26:12',
                'deleted_at' => null,
                'owner_id' => 3,
            ],
            1 => [
                'id' => 2,
                'name' => 'vasilevaslava95@inbox.ru',
                'created_at' => '2021-12-31 03:25:52',
                'updated_at' => '2021-12-31 03:25:52',
                'deleted_at' => null,
                'owner_id' => 4,
            ],
        ]);
    }
}
