<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LabelsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('labels')->delete();
    }
}
