<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'user_id' => 2,
                'role_id' => 1,
            ),
            2 => 
            array (
                'user_id' => 3,
                'role_id' => 1,
            ),
            3 => 
            array (
                'user_id' => 4,
                'role_id' => 1,
            ),
            4 => 
            array (
                'user_id' => 5,
                'role_id' => 1,
            ),
            5 => 
            array (
                'user_id' => 6,
                'role_id' => 1,
            ),
            6 => 
            array (
                'user_id' => 7,
                'role_id' => 1,
            ),
            7 => 
            array (
                'user_id' => 8,
                'role_id' => 2,
            ),
        ));
        
        
    }
}