<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\BalanceContainer;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BalancesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:balances';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Balances Data From Everflow APIs';

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
                    'from' => $dt->format('Y-m-d'),
                    'to' => $dt->format('Y-m-t'),
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

                    $revenue = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->where('time_year', $Year)->sum('revenue');
                    $payout = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->where('time_year', $Year)->sum('payout');
                    $profit = BalanceContainer::where('affiliate_id', $AffiliateID)->where('time_month', $Month)->where('time_year', $Year)->sum('profit');

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

            // Log::info('Balance Successfully Synced');
        } catch (Exception $e) {
            Log::info('Some Error In Balance Apis');
        }
    }
}
