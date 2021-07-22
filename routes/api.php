<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
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
    Route::apiResource('balances', 'BalancesApiController');

    // Payment Status
    Route::apiResource('payment-statuses', 'PaymentStatusApiController');

    // Payment Method
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

    // Template
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');
});
