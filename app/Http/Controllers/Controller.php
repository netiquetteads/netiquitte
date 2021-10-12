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
        $AffiliateAllCountSidebar  = Affiliate::count();
        $AffiliateActiveCountSidebar  = Affiliate::where('account_status','active')->count();
        $AffiliateInactiveCountSidebar  = Affiliate::where('account_status','inactive')->count();
        $AffiliatePendingCountSidebar  = Affiliate::where('account_status','pending')->count();
        $AffiliateSuspendedCountSidebar  = Affiliate::where('account_status','suspended')->count();

        $AdvertiserActiveCountSidebar  = Advertiser::where('account_status','active')->count();
        $AdvertiserInactiveCountSidebar  = Advertiser::where('account_status','inactive')->count();
        $AdvertiserPendingCountSidebar  = Advertiser::where('account_status','pending')->count();
        $AdvertiserSuspendedCountSidebar  = Advertiser::where('account_status','suspended')->count();

        View::share('AffiliateAllCountSidebar', $AffiliateAllCountSidebar);
        View::share('AffiliateActiveCountSidebar', $AffiliateActiveCountSidebar);
        View::share('AffiliateInactiveCountSidebar', $AffiliateInactiveCountSidebar);
        View::share('AffiliatePendingCountSidebar', $AffiliatePendingCountSidebar);
        View::share('AffiliateSuspendedCountSidebar', $AffiliateSuspendedCountSidebar);

        View::share('AdvertiserActiveCountSidebar', $AdvertiserActiveCountSidebar);
        View::share('AdvertiserInactiveCountSidebar', $AdvertiserInactiveCountSidebar);
        View::share('AdvertiserPendingCountSidebar', $AdvertiserPendingCountSidebar);
        View::share('AdvertiserSuspendedCountSidebar', $AdvertiserSuspendedCountSidebar);

    }
}
