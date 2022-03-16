<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnsubscribersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('unsubscribers')->delete();

        \DB::table('unsubscribers')->insert([
            0 => [
                'id' => 2,
                'email' => 'test1@example.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            1 => [
                'id' => 3,
                'email' => 'test@gmail.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            2 => [
                'id' => 4,
                'email' => 'test2@example.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            3 => [
                'id' => 5,
                'email' => 'vcollins@agamimedia.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            4 => [
                'id' => 6,
                'email' => 'martin@goketoguide.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            5 => [
                'id' => 7,
                'email' => 'carl@globalfastads.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            6 => [
                'id' => 8,
                'email' => 'info@globalfastads.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            7 => [
                'id' => 9,
                'email' => 'kiko@grownmobi.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            8 => [
                'id' => 10,
                'email' => 'networks@wowtrk.com',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
            9 => [
                'id' => 11,
                'email' => 'lucian.coman@qverse.io',
                'created_at' => '2022-02-25 12:35:03',
                'updated_at' => '2022-02-25 12:35:03',
            ],
        ]);
    }
}
