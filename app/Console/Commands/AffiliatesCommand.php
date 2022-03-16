<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Affiliate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AffiliatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:affiliates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Affiliates Data From Everflow APIs';

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
            ->post('https://api.eflow.team/v1/networks/affiliatestable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');

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
                    ]
                );

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

            // Log::info('Affiliates Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Affiliates Apis');
        }
    }
}
