<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BalanceContainerTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('balance_container')->delete();
    }
}
