<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CampaignOffersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('campaign_offers')->delete();

        \DB::table('campaign_offers')->insert([
            0 => [
                'campaign_id' => 1,
                'offer_id' => 731,
            ],
            1 => [
                'campaign_id' => 1,
                'offer_id' => 814,
            ],
            2 => [
                'campaign_id' => 1,
                'offer_id' => 815,
            ],
            3 => [
                'campaign_id' => 2,
                'offer_id' => 731,
            ],
        ]);
    }
}
