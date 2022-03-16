<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\AccountStatus;
use App\Models\Advertiser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AdvertiserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:advertisers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Advertisers Data From Everflow APIs';

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
            ->post('https://api.eflow.team/v1/networks/advertiserstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager');

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

            // Log::info('Advertisers Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Advertisers Apis');
        }
    }
}
