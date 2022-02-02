<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QaMessagesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('qa_messages')->delete();
    }
}
