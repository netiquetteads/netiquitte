<?php

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {

    //Everflow Apis
    Route::post('all-advertiser', 'EverflowApiController@getAllAdvertiser')->name('advertiser.getAllAdvertiser');
    Route::post('all-affiliates', 'EverflowApiController@getAllAffiliates')->name('advertiser.getAllAffiliates');
    Route::post('all-offers', 'EverflowApiController@getAllOffers')->name('advertiser.getAllOffers');
    Route::get('accounting', 'EverflowApiController@accounting')->name('balance.Accounting');
    Route::get('AccountingYTD', 'EverflowApiController@AccountingYTD')->name('balance.AccountingYTD');
    Route::get('manualUpdate', 'EverflowApiController@manualUpdate')->name('balance.manualUpdate');

    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Affiliate
    Route::post('affiliates/media', 'AffiliateApiController@storeMedia')->name('affiliates.storeMedia');
    Route::apiResource('affiliates', 'AffiliateApiController');

    // Account Status
    Route::apiResource('account-statuses', 'AccountStatusApiController');

    // Advertiser
    Route::post('advertisers/media', 'AdvertiserApiController@storeMedia')->name('advertisers.storeMedia');
    Route::apiResource('advertisers', 'AdvertiserApiController');

    // Label
    Route::apiResource('labels', 'LabelApiController');

    // Offer
    Route::apiResource('offers', 'OfferApiController');

    // Balances
    Route::get('getChartData', 'BalancesApiController@getChartData')->name('balances.getChartData');
    Route::apiResource('balances', 'BalancesApiController');

    // Payment Status
    Route::apiResource('payment-statuses', 'PaymentStatusApiController');

    // Payment Method
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Payment Method Type
    Route::apiResource('payment-method-type', 'PaymentMethodTypeApiController');

    // Template
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');

    // Campaign Results
    Route::apiResource('campaign-results', 'CampaignResultsApiController');

    // Results Tracking
    Route::apiResource('results-trackings', 'ResultsTrackingApiController');

    // Campaign
    Route::post('campaigns/media', 'CampaignApiController@storeMedia')->name('campaigns.storeMedia');
    Route::apiResource('campaigns', 'CampaignApiController');

    // Subscriber
    Route::apiResource('subscribers', 'SubscriberApiController');
    Route::post('subscribers/GetUnsubscribes', 'SubscriberApiController@GetUnsubscribes')->name('subscribers.GetUnsubscribes');

    // Subscription
    Route::apiResource('subscriptions', 'SubscriptionApiController');
});
