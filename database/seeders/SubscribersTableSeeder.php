<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subscribers')->delete();
        
        
        
    }
}