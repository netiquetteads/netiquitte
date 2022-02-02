<?php

namespace App\Jobs;

use App\Models\Account;
use App\Models\AccountStatus;
use App\Models\Advertiser;
use App\Models\Affiliate;
use App\Models\Balance;
use App\Models\BalanceContainer;
use App\Models\Offer;
use App\Models\User;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncEverflowApisJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->getAllAdvertiser();
        $this->getAllAffiliates();
        $this->getAllOffers();
        $this->manualUpdate();

        Log::info('Successfully synced all apis');
    }

    public function getAllAdvertiser()
    {
        try {
            $response = Http::withHeaders([
                'X-Eflow-API-Key' => env('EF_API_KEY'),
            ])
            ->withBody(json_encode([
                'search_terms' => [['search_type'=>'name', 'value'=>'']],
                // 'filters' => array('account_status'=>'active'),
            ]), 'json')
            ->post('https://api.eflow.team/v1/networks/advertiserstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');
            // ->post('https://api.eflow.team/v1/networks/advertiserstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

            $results = $response->json();

            foreach ($results['advertisers'] as $row) {
                $advertiser = Advertiser::updateOrCreate(
                    ['network_advertiserid' => $row['network_advertiser_id']],
                    [
                        'network_advertiserid'  => $row['network_advertiser_id'],
                        'networkid'             => $row['network_id'],
                        'name'                  => $row['name'],
                        'account_status'        => $row['account_status'],
                        'account_managerid'     => $row['account_manager_id'],
                        'account_manager_name'  => $row['account_manager_name'],
                        'sales_managerid'       => $row['sales_manager_id'],
                        'sales_manager_name'    => $row['sales_manager_name'],
                        'today_revenue'         => $row['today_revenue'],
                    ]
                );

                $account_status = AccountStatus::updateOrCreate(
                    ['name' => $row['account_status']],
                    ['name' => $row['account_status']]
                );

                $response2 = Http::withHeaders([
                    'X-Eflow-API-Key' => env('EF_API_KEY'),
                ])
                ->get('https://api.eflow.team/v1/networks/advertisers/'.$row['network_advertiser_id']);

                $AffiliateInfo = $response2->object();

                $response3 = Http::withHeaders([
                    'X-Eflow-API-Key' => env('EF_API_KEY'),
                ])
                ->get('https://api.eflow.team/v1/networks/advertisers/'.$row['network_advertiser_id'].'/users');

                $AffiliateInfoUser = $response3->object();

                if ($AffiliateInfoUser->users) {
                    $EmailAddress = $AffiliateInfoUser->users[0]->email;
                    $FirstName = $AffiliateInfoUser->users[0]->first_name;
                    $LastName = $AffiliateInfoUser->users[0]->last_name;
                    $AccountStatus = $AffiliateInfoUser->users[0]->account_status;
                    $Company = $AffiliateInfo->name;

                    $account = Account::updateOrCreate(
                        [
                            'PlatformUserID' => $row['network_advertiser_id'],
                            'AccountType' => 2,
                        ],
                        [
                            'FirstName' 		 => $FirstName,
                            'LastName'           => $LastName,
                            'EmailAddress'       => $EmailAddress,
                            'Company'       	 => $Company,
                            'PlatformUserID'     => $row['network_advertiser_id'],
                            'AccountStatus'  	 => $AccountStatus,
                            'AccountType'        => 2,
                            'SubscribedStatus'   => 'Subscribed',
                        ]
                    );
                }
            }

            Log::info('Advertisers Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Advertisers Apis');
        }
    }

    public function getAllAffiliates()
    {
        try {
            $response = Http::withHeaders([
                'X-Eflow-API-Key' => env('EF_API_KEY'),
            ])
            ->withBody(json_encode([
                'search_terms' => [['search_type'=>'name', 'value'=>'']],
                // 'filters' => array('account_status'=>'active'),
            ]), 'json')
            ->post('https://api.eflow.team/v1/networks/affiliatestable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');
            // ->post('https://api.eflow.team/v1/networks/affiliatestable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

            $results = $response->json();

            foreach ($results['affiliates'] as $row) {
                $affiliate = Affiliate::updateOrCreate(
                    ['network_affiliateid' => $row['network_affiliate_id']],
                    [
                        'network_affiliateid'           => $row['network_affiliate_id'],
                        'networkid'                     => $row['network_id'],
                        'name'                          => $row['name'],
                        'account_managerid'             => $row['account_manager_id'],
                        'account_manager_name'          => $row['account_manager_name'],
                        'account_executiveid'           => $row['account_executive_id'],
                        'account_executive_name'        => $row['account_executive_name'],
                        'today_revenue'                 => $row['today_revenue'],
                        'balance'                       => $row['balance'],
                        'global_tracking_domain_url'    => $row['global_tracking_domain_url'],
                        'network_country_code'          => $row['network_country_code'],
                        'time_created'          		=> $row['time_created'],
                        'time_saved'          			=> $row['time_saved'],
                        'account_status'          		=> $row['account_status'],
                        // 'last_login'					=> $row['last_login']
                    ]
                );

                // $user = User::updateOrCreate(
                // 	['name' => $row['account_manager_name']],
                // 	['name' => $row['account_manager_name']]
                // );

                // $user2 = User::updateOrCreate(
                // 	['name' => $row['account_executive_name']],
                // 	['name' => $row['account_executive_name']]
                // );

                $response2 = Http::withHeaders([
                    'X-Eflow-API-Key' => env('EF_API_KEY'),
                ])
                ->get('https://api.eflow.team/v1/networks/affiliates/'.$row['network_affiliate_id']);

                $AffiliateInfo = $response2->object();

                $response3 = Http::withHeaders([
                    'X-Eflow-API-Key' => env('EF_API_KEY'),
                ])
                ->get('https://api.eflow.team/v1/networks/affiliates/'.$row['network_affiliate_id'].'/users');

                $AffiliateInfoUser = $response3->object();

                if ($AffiliateInfoUser->users) {
                    $EmailAddress = $AffiliateInfoUser->users[0]->email;
                    $FirstName = $AffiliateInfoUser->users[0]->first_name;
                    $LastName = $AffiliateInfoUser->users[0]->last_name;
                    $AccountStatus = $AffiliateInfoUser->users[0]->account_status;
                    $Company = $AffiliateInfo->name;

                    $account = Account::updateOrCreate(
                        [
                            'PlatformUserID' => $row['network_affiliate_id'],
                            'AccountType' => 1,
                        ],
                        [
                            'FirstName' 		 => $FirstName,
                            'LastName'           => $LastName,
                            'EmailAddress'       => $EmailAddress,
                            'Company'       	 => $Company,
                            'PlatformUserID'     => $row['network_affiliate_id'],
                            'AccountStatus'  	 => $AccountStatus,
                            'AccountType'        => 1,
                            'SubscribedStatus'   => 'Subscribed',
                        ]
                    );
                }
            }

            Log::info('Affiliates Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Affiliates Apis');
        }
    }

    public function getAllOffers()
    {
        try {
            $response = Http::withHeaders([
                'X-Eflow-API-Key' => env('EF_API_KEY'),
            ])
            ->withBody(json_encode([
                'search_terms' => [['search_type'=>'name', 'value'=>'']],
                // 'filters' => array('account_status'=>'active'),
            ]), 'json')
            ->post('https://api.eflow.team/v1/networks/offerstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');
            // ->post('https://api.eflow.team/v1/networks/offerstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

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

                // $user = User::updateOrCreate(
                // 	['name' => $row['network_advertiser_name']],
                // 	['name' => $row['network_advertiser_name']]
                // );
            }

            Log::info('Offers Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Offers Apis');
        }
    }

    public function manualUpdate()
    {
        try {
            $fromDate = date('Y-m-d', strtotime(date('Y-01-01')));
            $toDate = date('Y-m-d', strtotime(date('Y-m-d')));
            $begin = new DateTime($fromDate);
            $end = new DateTime($toDate);

            $interval = DateInterval::createFromDateString('1 month');
            $period = new DatePeriod($begin, $interval, $end);

            foreach ($period as $key => $dt) {
                $Year = $dt->format('Y');
                $MonthName = $dt->format('F');

                $response = Http::withHeaders([
                    'content-type' => 'application/json',
                    'x-eflow-api-key' => env('EF_API_KEY'),
                ])
                ->withBody(json_encode([
                    'from' => $fromDate,
                    'to' => $toDate,
                    'timezone_id' => 80,
                    'currency_id' => 'USD',
                    'query' => ['filters'=>[], 'settings'=>['ignore_fail_traffic'=>false], 'metric_filters'=>[], 'exclusions'=>[]],
                    'columns' => [['column'=>'affiliate'], ['column'=>'offer']],
                ]), 'json')
                ->post('https://api.eflow.team/v1/networks/reporting/entity');

                $results = $response->json();

                $deResp = json_decode($response);
                $MonthlyTotal = $deResp->summary->revenue;
                $MonthlyPayout = $deResp->summary->payout;
                $MonthlyProfit = $deResp->summary->profit;
                $tmpTable = $deResp->table;

                foreach ($tmpTable as $value) {
                    $Affiliate = $value->columns[0]->label;
                    $AffiliateID = $value->columns[0]->id;
                    $Offer = $value->columns[1]->label;
                    $OfferID = $value->columns[1]->id;
                    $Revenue = $value->reporting->revenue;
                    $Payout = $value->reporting->payout;
                    $Profit = $value->reporting->profit;

                    $BalanceContainer = new BalanceContainer;
                    $BalanceContainer->time_year = $Year;
                    $BalanceContainer->time_month = $MonthName;
                    $BalanceContainer->affiliate = $Affiliate;
                    $BalanceContainer->affiliate_id = $AffiliateID;
                    $BalanceContainer->offer = $Offer;
                    $BalanceContainer->offer_id = $OfferID;
                    $BalanceContainer->revenue = $Revenue;
                    $BalanceContainer->payout = $Payout;
                    $BalanceContainer->profit = $Profit;
                    $BalanceContainer->save();
                }

                $containers = BalanceContainer::select('affiliate', 'affiliate_id', 'time_month', 'monthly_status')->distinct()->get();

                foreach ($containers as $key => $container) {
                    $Affiliate = $container->affiliate;
                    $AffiliateID = $container->affiliate_id;
                    $Month = $container->time_month;
                    $MonthlyStatus = $container->monthly_status;

                    $revenue = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->sum('revenue');
                    $payout = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->sum('payout');
                    $profit = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->sum('profit');

                    $balance = Balance::updateOrCreate(
                        [
                            'affiliate_id' => $AffiliateID,
                            'accounting_year' => $Year,
                            'accounting_month' => $MonthName,
                        ],
                        [
                            'affiliate_id'           => $AffiliateID,
                            'accounting_year'        => $Year,
                            'accounting_month'       => $MonthName,
                            'affiliate'              => $Affiliate,
                            'payout'                 => $payout,
                            'revenue'                => $revenue,
                            'profit'                 => $profit,
                        ]
                    );
                }

                BalanceContainer::query()->truncate();
            }

            Log::info('Balance Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Balance Apis');
        }
    }
}
