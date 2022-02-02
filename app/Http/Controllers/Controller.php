<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Affiliate;
use App\Models\Offer;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request, ToastrFactory $flasher)
    {
        $AffiliateAllCountSidebar = Affiliate::count();
        $AffiliateActiveCountSidebar = Affiliate::where('account_status', 'active')->count();
        $AffiliateInactiveCountSidebar = Affiliate::where('account_status', 'inactive')->count();
        $AffiliatePendingCountSidebar = Affiliate::where('account_status', 'pending')->count();
        $AffiliateSuspendedCountSidebar = Affiliate::where('account_status', 'suspended')->count();

        $AdvertiserActiveCountSidebar = Advertiser::where('account_status', 'active')->count();
        $AdvertiserInactiveCountSidebar = Advertiser::where('account_status', 'inactive')->count();
        $AdvertiserPendingCountSidebar = Advertiser::where('account_status', 'pending')->count();
        $AdvertiserSuspendedCountSidebar = Advertiser::where('account_status', 'suspended')->count();

        $OfferAllCountSidebar = Offer::count();
        $OfferActiveCountSidebar = Offer::where('offer_status', 'active')->count();
        $OfferPausedCountSidebar = Offer::where('offer_status', 'paused')->count();
        $OfferPendingCountSidebar = Offer::where('offer_status', 'pending')->count();
        $OfferDeletedCountSidebar = Offer::where('offer_status', 'deleted')->count();

        View::share('AffiliateAllCountSidebar', $AffiliateAllCountSidebar);
        View::share('AffiliateActiveCountSidebar', $AffiliateActiveCountSidebar);
        View::share('AffiliateInactiveCountSidebar', $AffiliateInactiveCountSidebar);
        View::share('AffiliatePendingCountSidebar', $AffiliatePendingCountSidebar);
        View::share('AffiliateSuspendedCountSidebar', $AffiliateSuspendedCountSidebar);

        View::share('AdvertiserActiveCountSidebar', $AdvertiserActiveCountSidebar);
        View::share('AdvertiserInactiveCountSidebar', $AdvertiserInactiveCountSidebar);
        View::share('AdvertiserPendingCountSidebar', $AdvertiserPendingCountSidebar);
        View::share('AdvertiserSuspendedCountSidebar', $AdvertiserSuspendedCountSidebar);

        View::share('OfferAllCountSidebar', $OfferAllCountSidebar);
        View::share('OfferActiveCountSidebar', $OfferActiveCountSidebar);
        View::share('OfferPausedCountSidebar', $OfferPausedCountSidebar);
        View::share('OfferPendingCountSidebar', $OfferPendingCountSidebar);
        View::share('OfferDeletedCountSidebar', $OfferDeletedCountSidebar);
    }
}
