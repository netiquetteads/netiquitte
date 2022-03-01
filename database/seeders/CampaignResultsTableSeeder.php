<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CampaignResultsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('campaign_results')->delete();
    }
}
