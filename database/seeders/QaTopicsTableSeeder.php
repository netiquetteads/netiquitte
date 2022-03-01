<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QaTopicsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('qa_topics')->delete();
    }
}
