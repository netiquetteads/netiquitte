<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Advertiser;
use App\Models\Affiliate;
use App\Models\Offer;
use App\Models\User;
use App\Models\AccountStatus;

class EverflowApiController extends Controller
{
    public function getAllAdvertiser()
    {

    	try{
        
	        $response = Http::withHeaders([
	            'X-Eflow-API-Key' => env('EF_API_KEY'),
	        ])
	        ->withBody(json_encode([
	            'search_terms' => [array('search_type'=>'name','value'=>"")],
	            // 'filters' => array('account_status'=>'active'),
	        ]), 'json')
	        ->post('https://api.eflow.team/v1/networks/advertiserstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

	        $results=$response->json();

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
	        }

	        return response()->json([
	            "message" => "Recorded successfully",
	            "content" => $results
	        ], 201);

	    } catch (Exception $e) {
			return response()->json([
				"message" => "No Changes Since Last Sync",
				"Caught Exception" => $e->getMessage()
			], 400);
		}
    }

    public function getAllAffiliates()
    {
    	try{
	        $response = Http::withHeaders([
	            'X-Eflow-API-Key' => env('EF_API_KEY'),
	        ])
	        ->withBody(json_encode([
	            'search_terms' => [array('search_type'=>'name','value'=>"")],
	            // 'filters' => array('account_status'=>'active'),
	        ]), 'json')
	        ->post('https://api.eflow.team/v1/networks/affiliatestable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

	        $results=$response->json();

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

	        }


	        return response()->json([
	            "message" => "Recorded successfully",
	            "content" => $results
	        ], 201);

	    } catch (Exception $e) {
			return response()->json([
				"message" => "No Changes Sincle Last Sync",
				"Caught Exception" => $e->getMessage()
			], 400);
		}    
    }

    public function getAllOffers()
    {	
    	try{
	        $response = Http::withHeaders([
	            'X-Eflow-API-Key' => env('EF_API_KEY'),
	        ])
	        ->withBody(json_encode([
	            'search_terms' => [array('search_type'=>'name','value'=>"")],
	            // 'filters' => array('account_status'=>'active'),
	        ]), 'json')
	        ->post('https://api.eflow.team/v1/networks/offerstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=1000');

	        $results=$response->json();

	        foreach ($results['offers'] as $row) {
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
						'time_created'                  => date("H:m:s",$row['time_created']),
						'time_saved'                    => date("H:m:s",$row['time_saved']),
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
					]
				);

				// $user = User::updateOrCreate(
				// 	['name' => $row['network_advertiser_name']],
				// 	['name' => $row['network_advertiser_name']]
				// ); 
	        }

	        return response()->json([
	            "message" => "Recorded successfully",
	            "content" => $results
	        ], 201);
	    } catch (Exception $e) {
			return response()->json([
				"message" => "No Changes Sincle Last Sync",
				"Caught Exception" => $e->getMessage()
			], 400);
		}    
    }
}
