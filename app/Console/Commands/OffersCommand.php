<?php

namespace App\Console\Commands;

use App\Models\Offer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OffersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:offers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Offers Data From Everflow APIs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $response = Http::withHeaders([
                'X-Eflow-API-Key' => env('EF_API_KEY'),
            ])
            ->withBody(json_encode([
                'search_terms' => [['search_type'=>'name', 'value'=>'']],
            ]), 'json')
            ->post('https://api.eflow.team/v1/networks/offerstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');

            $results = $response->json();

            foreach ($results['offers'] as $row) {
                $Countries = '';
                $tmpCountries = $row['relationship']['ruleset']['countries'];
                foreach ($tmpCountries as $countryid => $countrycode) {
                    $Countries .= $tmpCountries[$countryid]['country_code'].' ';
                }

                $response2 = Http::withHeaders([
                    'X-Eflow-API-Key' => env('EF_API_KEY'),
                ])
                ->get('https://api.eflow.team/v1/networks/offers/'.$row['network_offer_id']);

                $singleOffer = $response2->object();

                $offer = Offer::updateOrCreate(
                    ['network_offer' => $row['network_offer_id']],
                    [
                        'network_offer'                 => $row['network_offer_id'],
                        'network'                       => $row['network_id'],
                        'name'                          => $row['name'],
                        'offer_status'                  => $row['offer_status'],
                        'thumbnail_url'                 => $row['thumbnail_url'],
                        'visibility'                    => $row['visibility'],
                        'network_advertiser_name'       => $row['network_advertiser_name'],
                        'category'                      => $row['category'],
                        'network_offer_group'           => $row['network_offer_group_id'],
                        'time_created'                  => date('H:m:s', $row['time_created']),
                        'time_saved'                    => date('H:m:s', $row['time_saved']),
                        'payout'                        => $row['payout'],
                        'revenue'                       => $row['revenue'],
                        'today_revenue'                 => $row['today_revenue'],
                        'destination_url'               => $row['destination_url'],
                        'today_clicks'                  => $row['today_clicks'],
                        'optimized_thumbnail_url'       => $row['optimized_thumbnail_url'],
                        'revenue_amount'                => $row['revenue_amount'],
                        'payout_amount'                 => $row['payout_amount'],
                        'today_revenue_amount'          => $row['today_revenue_amount'],
                        'today_payout_amount'           => $row['today_payout_amount'],
                        'payout_type'                   => $row['payout_type'],
                        'revenue_type'                  => $row['revenue_type'],
                        'preview_url'                  	=> $singleOffer->preview_url,
                        'description'                  	=> $singleOffer->html_description,
                        'countries'                  	=> $Countries,
                        'source'                  	    => 'Everflow',
                    ]
                );
            }

            // Log::info('Offers Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Offers Apis');
        }
    }
}
