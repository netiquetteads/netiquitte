<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YEM9xPmiGzqro.fPv/QxSODeAbe.w3fKU1H9Fm8bQXwWeBTxXNiSe',
                'remember_token' => '1tGVvjx64Gw1beCNYdZk3iiN5KwIC7zOPPLO9CzXjwazPBO5yVIjhDPkNVLp',
                'created_at' => NULL,
                'updated_at' => '2021-12-17 21:05:02',
                'deleted_at' => NULL,
                'team_id' => NULL,
                'approved' => 1,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '',
                'email' => 'tpsvishwas78@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iid6AEsYfV5tE32EAjVztOOFw4XHvbyUYEi8R5cbyA1tWVbXcp.tC',
                'remember_token' => 'wNZV18g68bjxeJasddcEGRo8oi9qdYDeRjjdfcAnzhY4FtUQqH0FFyrcpx4U',
                'created_at' => '2021-12-17 21:07:11',
                'updated_at' => '2022-02-23 20:39:07',
                'deleted_at' => NULL,
                'team_id' => NULL,
                'approved' => 0,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Tapas',
                'last_name' => 'Vishwas',
                'work_phone' => '+919039998725',
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => '',
                'email' => 'goba@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Hc719A0b2XyzxE054A7GzOIGC9lfN0nsBe7yobVQfTDuKmr7ohFX2',
                'remember_token' => NULL,
                'created_at' => '2021-12-19 16:26:12',
                'updated_at' => '2022-01-18 22:20:25',
                'deleted_at' => '2022-01-18 22:20:25',
                'team_id' => 1,
                'approved' => 0,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => NULL,
                'last_name' => NULL,
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => '',
                'email' => 'vasilevaslava95@inbox.ru',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zw8pr6RZ0LG3pDmab.UQWO7dPZIKgE33Q7i8hpk63gvDXOjo2mL22',
                'remember_token' => NULL,
                'created_at' => '2021-12-31 03:25:51',
                'updated_at' => '2022-01-18 22:20:32',
                'deleted_at' => '2022-01-18 22:20:32',
                'team_id' => 2,
                'approved' => 0,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => NULL,
                'last_name' => NULL,
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => '',
                'email' => 'wecodelaravel@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zAbxGjONkQalLfEcm7dsFe5OxmSsFA4OGc3o0LszO8EvYLorlWZVO',
                'remember_token' => NULL,
                'created_at' => '2022-01-18 22:23:27',
                'updated_at' => '2022-01-18 22:23:27',
                'deleted_at' => NULL,
                'team_id' => NULL,
                'approved' => 1,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Phillip',
                'last_name' => 'Madsen',
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => '',
                'email' => 'owenrupchand@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$oHWWbRtPyDMQh9bvJ.fQ3et0P0VZWelI9vPGVbpw1NvVgfq8G.wpG',
                'remember_token' => NULL,
                'created_at' => '2022-02-03 14:10:49',
                'updated_at' => '2022-02-23 20:18:49',
                'deleted_at' => NULL,
                'team_id' => 3,
                'approved' => 1,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Owen',
                'last_name' => 'Rupchand',
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => '',
                'email' => 'tpsvishwas786@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ebEV.6ABCYkuc6fMccFfROGRmpYjRTPCIRed1IMKEQ6FE4SjYKhJW',
                'remember_token' => 's6UeyAaskmDEpaeJgKFKSBJthzz5NV0KIcrzaiVjhhNyZ3D5jJjZUgzRMJRg',
                'created_at' => '2022-02-23 20:39:49',
                'updated_at' => '2022-02-23 20:41:01',
                'deleted_at' => NULL,
                'team_id' => 4,
                'approved' => 0,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Tapas',
                'last_name' => 'Test',
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => '',
                'email' => 'owen@prosprio.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$hynBmpdrd1V/4T7/Qpe97.g3HvlSntbNSQxPu1kN27EX255SpoKpO',
                'remember_token' => NULL,
                'created_at' => '2022-02-28 22:53:22',
                'updated_at' => '2022-02-28 22:53:22',
                'deleted_at' => NULL,
                'team_id' => NULL,
                'approved' => 0,
                'linkedin' => NULL,
                'skype' => NULL,
                'first_name' => 'Test',
                'last_name' => 'Test',
                'work_phone' => NULL,
                'cell_phone' => NULL,
                'instant_messaginid' => NULL,
                'instant_messaging_identifier' => NULL,
            ),
        ));
        
        
    }
}