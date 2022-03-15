<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CampaignOffersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('campaign_offers')->delete();
        
        \DB::table('campaign_offers')->insert(array (
            0 => 
            array (
                'campaign_id' => 1,
                'offer_id' => 731,
            ),
            1 => 
            array (
                'campaign_id' => 1,
                'offer_id' => 814,
            ),
            2 => 
            array (
                'campaign_id' => 1,
                'offer_id' => 815,
            ),
            3 => 
            array (
                'campaign_id' => 2,
                'offer_id' => 731,
            ),
            4 => 
            array (
                'campaign_id' => 3,
                'offer_id' => 59,
            ),
            5 => 
            array (
                'campaign_id' => 4,
                'offer_id' => 696,
            ),
            6 => 
            array (
                'campaign_id' => 5,
                'offer_id' => 718,
            ),
            7 => 
            array (
                'campaign_id' => 6,
                'offer_id' => 59,
            ),
            8 => 
            array (
                'campaign_id' => 6,
                'offer_id' => 687,
            ),
            9 => 
            array (
                'campaign_id' => 7,
                'offer_id' => 687,
            ),
            10 => 
            array (
                'campaign_id' => 7,
                'offer_id' => 711,
            ),
            11 => 
            array (
                'campaign_id' => 8,
                'offer_id' => 117,
            ),
            12 => 
            array (
                'campaign_id' => 9,
                'offer_id' => 59,
            ),
            13 => 
            array (
                'campaign_id' => 9,
                'offer_id' => 687,
            ),
            14 => 
            array (
                'campaign_id' => 10,
                'offer_id' => 70,
            ),
            15 => 
            array (
                'campaign_id' => 11,
                'offer_id' => 7,
            ),
            16 => 
            array (
                'campaign_id' => 11,
                'offer_id' => 864,
            ),
            17 => 
            array (
                'campaign_id' => 12,
                'offer_id' => 902,
            ),
            18 => 
            array (
                'campaign_id' => 12,
                'offer_id' => 933,
            ),
            19 => 
            array (
                'campaign_id' => 13,
                'offer_id' => 926,
            ),
            20 => 
            array (
                'campaign_id' => 13,
                'offer_id' => 940,
            ),
            21 => 
            array (
                'campaign_id' => 13,
                'offer_id' => 941,
            ),
            22 => 
            array (
                'campaign_id' => 14,
                'offer_id' => 937,
            ),
            23 => 
            array (
                'campaign_id' => 14,
                'offer_id' => 938,
            ),
            24 => 
            array (
                'campaign_id' => 15,
                'offer_id' => 687,
            ),
            25 => 
            array (
                'campaign_id' => 16,
                'offer_id' => 710,
            ),
            26 => 
            array (
                'campaign_id' => 16,
                'offer_id' => 711,
            ),
            27 => 
            array (
                'campaign_id' => 17,
                'offer_id' => 59,
            ),
            28 => 
            array (
                'campaign_id' => 18,
                'offer_id' => 969,
            ),
            29 => 
            array (
                'campaign_id' => 25,
                'offer_id' => 907,
            ),
        ));
        
        
    }
}