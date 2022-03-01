<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AccountStatusesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('account_statuses')->delete();

        \DB::table('account_statuses')->insert([
            0 => [
                'id' => 1,
                'name' => 'inactive',
                'created_at' => '2021-12-19 16:37:26',
                'updated_at' => '2021-12-19 16:37:26',
                'deleted_at' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'active',
                'created_at' => '2021-12-19 16:37:26',
                'updated_at' => '2021-12-19 16:37:26',
                'deleted_at' => null,
            ],
            2 => [
                'id' => 3,
                'name' => 'pending',
                'created_at' => '2021-12-19 16:37:47',
                'updated_at' => '2021-12-19 16:37:47',
                'deleted_at' => null,
            ],
        ]);
    }
}
