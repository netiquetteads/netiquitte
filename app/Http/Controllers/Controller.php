<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Advertiser;
use App\Models\Affiliate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
	{
        $AffiliateAllCount  = Affiliate::count();
        $AffiliateActiveCount  = Affiliate::where('account_status','active')->count();
        $AffiliateInactiveCount  = Affiliate::where('account_status','inactive')->count();
        $AffiliatePendingCount  = Affiliate::where('account_status','pending')->count();
        $AffiliateSuspendedCount  = Affiliate::where('account_status','suspended')->count();

        $AdvertiserActiveCount  = Advertiser::where('account_status','active')->count();
        $AdvertiserInactiveCount  = Advertiser::where('account_status','inactive')->count();
        $AdvertiserPendingCount  = Advertiser::where('account_status','pending')->count();
        $AdvertiserSuspendedCount  = Advertiser::where('account_status','suspended')->count();

        View::share('AffiliateAllCount', $AffiliateAllCount);
        View::share('AffiliateActiveCount', $AffiliateActiveCount);
        View::share('AffiliateInactiveCount', $AffiliateInactiveCount);
        View::share('AffiliatePendingCount', $AffiliatePendingCount);
        View::share('AffiliateSuspendedCount', $AffiliateSuspendedCount);

        View::share('AdvertiserActiveCount', $AdvertiserActiveCount);
        View::share('AdvertiserInactiveCount', $AdvertiserInactiveCount);
        View::share('AdvertiserPendingCount', $AdvertiserPendingCount);
        View::share('AdvertiserSuspendedCount', $AdvertiserSuspendedCount);

    }
}
