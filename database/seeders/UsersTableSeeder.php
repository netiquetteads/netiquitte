<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => null,
                'password' => '$2y$10$YEM9xPmiGzqro.fPv/QxSODeAbe.w3fKU1H9Fm8bQXwWeBTxXNiSe',
                'remember_token' => 'NTkJPkUnCTFcPavEQ69li64qDPIRBUdavEVqLCq9rGHXkQ6t0XTImvW2PQ1c',
                'created_at' => null,
                'updated_at' => '2021-12-17 21:05:02',
                'deleted_at' => null,
                'team_id' => null,
                'approved' => 1,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            1 => [
                'id' => 2,
                'name' => '',
                'email' => 'tpsvishwas78@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$YTayH.rGpCmR9huOb6/DGew872rj5nCiuIV8JXpg7KMAFNxyAaeF6',
                'remember_token' => null,
                'created_at' => '2021-12-17 21:07:11',
                'updated_at' => '2021-12-17 21:07:11',
                'deleted_at' => null,
                'team_id' => null,
                'approved' => 1,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Tapas',
                'last_name' => 'Vishwas',
                'work_phone' => '+919039998725',
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            2 => [
                'id' => 3,
                'name' => '',
                'email' => 'goba@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$Hc719A0b2XyzxE054A7GzOIGC9lfN0nsBe7yobVQfTDuKmr7ohFX2',
                'remember_token' => null,
                'created_at' => '2021-12-19 16:26:12',
                'updated_at' => '2021-12-19 16:26:12',
                'deleted_at' => null,
                'team_id' => 1,
                'approved' => 0,
                'linkedin' => null,
                'skype' => null,
                'first_name' => null,
                'last_name' => null,
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            3 => [
                'id' => 4,
                'name' => '',
                'email' => 'vasilevaslava95@inbox.ru',
                'email_verified_at' => null,
                'password' => '$2y$10$zw8pr6RZ0LG3pDmab.UQWO7dPZIKgE33Q7i8hpk63gvDXOjo2mL22',
                'remember_token' => null,
                'created_at' => '2021-12-31 03:25:51',
                'updated_at' => '2021-12-31 03:25:52',
                'deleted_at' => null,
                'team_id' => 2,
                'approved' => 0,
                'linkedin' => null,
                'skype' => null,
                'first_name' => null,
                'last_name' => null,
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
        ]);
    }
}
