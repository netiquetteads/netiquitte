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
            4 => [
                'campaign_id' => 3,
                'offer_id' => 59,
            ],
            5 => [
                'campaign_id' => 4,
                'offer_id' => 696,
            ],
            6 => [
                'campaign_id' => 5,
                'offer_id' => 718,
            ],
            7 => [
                'campaign_id' => 6,
                'offer_id' => 59,
            ],
            8 => [
                'campaign_id' => 6,
                'offer_id' => 687,
            ],
            9 => [
                'campaign_id' => 7,
                'offer_id' => 687,
            ],
            10 => [
                'campaign_id' => 7,
                'offer_id' => 711,
            ],
            11 => [
                'campaign_id' => 8,
                'offer_id' => 117,
            ],
            12 => [
                'campaign_id' => 9,
                'offer_id' => 59,
            ],
            13 => [
                'campaign_id' => 9,
                'offer_id' => 687,
            ],
            14 => [
                'campaign_id' => 10,
                'offer_id' => 70,
            ],
            15 => [
                'campaign_id' => 11,
                'offer_id' => 7,
            ],
            16 => [
                'campaign_id' => 11,
                'offer_id' => 864,
            ],
            17 => [
                'campaign_id' => 12,
                'offer_id' => 902,
            ],
            18 => [
                'campaign_id' => 12,
                'offer_id' => 933,
            ],
            19 => [
                'campaign_id' => 13,
                'offer_id' => 926,
            ],
            20 => [
                'campaign_id' => 13,
                'offer_id' => 940,
            ],
            21 => [
                'campaign_id' => 13,
                'offer_id' => 941,
            ],
            22 => [
                'campaign_id' => 14,
                'offer_id' => 937,
            ],
            23 => [
                'campaign_id' => 14,
                'offer_id' => 938,
            ],
            24 => [
                'campaign_id' => 15,
                'offer_id' => 687,
            ],
            25 => [
                'campaign_id' => 16,
                'offer_id' => 710,
            ],
            26 => [
                'campaign_id' => 16,
                'offer_id' => 711,
            ],
            27 => [
                'campaign_id' => 17,
                'offer_id' => 59,
            ],
            28 => [
                'campaign_id' => 18,
                'offer_id' => 969,
            ],
            29 => [
                'campaign_id' => 25,
                'offer_id' => 907,
            ],
        ]);
    }
}
