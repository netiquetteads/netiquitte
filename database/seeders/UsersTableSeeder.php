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
                'name' => 'Phillip Madsen',
                'email' => 'wecodelaravel@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$zAbxGjONkQalLfEcm7dsFe5OxmSsFA4OGc3o0LszO8EvYLorlWZVO',
                'remember_token' => null,
                'created_at' => '2022-01-18 22:23:27',
                'updated_at' => '2022-01-18 22:23:27',
                'deleted_at' => null,
                'team_id' => null,
                'approved' => 1,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Phillip',
                'last_name' => 'Madsen',
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            1 => [
                'id' => 2,
                'name' => 'Owen Rupchand',
                'email' => 'owenrupchand@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$oHWWbRtPyDMQh9bvJ.fQ3et0P0VZWelI9vPGVbpw1NvVgfq8G.wpG',
                'remember_token' => null,
                'created_at' => '2022-02-03 14:10:49',
                'updated_at' => '2022-02-23 20:18:49',
                'deleted_at' => null,
                'team_id' => 3,
                'approved' => 1,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Owen',
                'last_name' => 'Rupchand',
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            2 => [
                'id' => 3,
                'name' => 'Tapas Vishwas',
                'email' => 'tpsvishwas786@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$ebEV.6ABCYkuc6fMccFfROGRmpYjRTPCIRed1IMKEQ6FE4SjYKhJW',
                'remember_token' => 's6UeyAaskmDEpaeJgKFKSBJthzz5NV0KIcrzaiVjhhNyZ3D5jJjZUgzRMJRg',
                'created_at' => '2022-02-23 20:39:49',
                'updated_at' => '2022-02-23 20:41:01',
                'deleted_at' => null,
                'team_id' => 4,
                'approved' => 1,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Tapas',
                'last_name' => 'Vishwas',
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
            3 => [
                'id' => 4,
                'name' => 'Test',
                'email' => 'owen@prosprio.com',
                'email_verified_at' => null,
                'password' => '$2y$10$hynBmpdrd1V/4T7/Qpe97.g3HvlSntbNSQxPu1kN27EX255SpoKpO',
                'remember_token' => null,
                'created_at' => '2022-02-28 22:53:22',
                'updated_at' => '2022-02-28 22:53:22',
                'deleted_at' => null,
                'team_id' => null,
                'approved' => 0,
                'linkedin' => null,
                'skype' => null,
                'first_name' => 'Test',
                'last_name' => 'Test',
                'work_phone' => null,
                'cell_phone' => null,
                'instant_messaginid' => null,
                'instant_messaging_identifier' => null,
            ],
        ]);
    }
}
