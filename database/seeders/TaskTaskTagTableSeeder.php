<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskTaskTagTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('task_task_tag')->delete();
    }
}
