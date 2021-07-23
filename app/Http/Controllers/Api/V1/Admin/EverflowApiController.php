<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Advertiser;
use App\Models\Affiliate;
use App\Models\Offer;

class EverflowApiController extends Controller
{
    public function getAllAdvertiser()
    {
        $response = Http::withHeaders([
            'X-Eflow-API-Key' => env('CLIENT_API_KEY'),
        ])
        ->withBody(json_encode([
            'search_terms' => [array('search_type'=>'name','value'=>"")],
            'filters' => array('account_status'=>'active'),
        ]), 'json')
        ->post('https://api.eflow.team/v1/networks/advertiserstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=100');

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
					'sales_manager_name'         => $row['sales_manager_name'],
					'today_revenue'         => $row['today_revenue'],
				]
			);
        }

        return response()->json([
            "message" => "Recorded successfully",
            "content" => $results
        ], 201);
    }

    public function getAllAffiliates()
    {
        $response = Http::withHeaders([
            'X-Eflow-API-Key' => env('CLIENT_API_KEY'),
        ])
        ->withBody(json_encode([
            'search_terms' => [array('search_type'=>'name','value'=>"")],
            'filters' => array('account_status'=>'active'),
        ]), 'json')
        ->post('https://api.eflow.team/v1/networks/affiliatestable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=100');

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
				]
			);
        }

        return response()->json([
            "message" => "Recorded successfully",
            "content" => $results
        ], 201);
    }

    public function getAllOffers()
    {
        $response = Http::withHeaders([
            'X-Eflow-API-Key' => env('CLIENT_API_KEY'),
        ])
        ->withBody(json_encode([
            'search_terms' => [array('search_type'=>'name','value'=>"")],
            'filters' => array('account_status'=>'active'),
        ]), 'json')
        ->post('https://api.eflow.team/v1/networks/offerstable?relationship=ruleset&relationship=tracking_domain&relationship=account_manager&relationship=sales_manager&page=1&page_size=100');

        $results=$response->json();

        // foreach ($results['offers'] as $row) {
        //     $offer = Offer::updateOrCreate(
		// 		['network_affiliateid' => $row['network_offer_id']],
		// 		[
		// 			'network_affiliateid'           => $row['network_offer_id'],
		// 			'networkid'                     => $row['network_id'],
		// 			'name'                          => $row['name'],
		// 			'account_status'                => $row['account_status'],
		// 			'account_managerid'             => $row['account_manager_id'],
		// 			'account_manager_name'          => $row['account_manager_name'],
		// 			'account_executiveid'           => $row['account_executive_id'],
		// 			'account_executive_name'        => $row['account_executive_name'],
		// 			'today_revenue'                 => $row['today_revenue'],
		// 			'balance'                       => $row['balance'],
		// 			'global_tracking_domain_url'    => $row['global_tracking_domain_url'],
		// 			'network_country_code'          => $row['network_country_code'],
		// 		]
		// 	);
        // }

        return response()->json([
            "message" => "Recorded successfully",
            "content" => $results
        ], 201);
    }
}
