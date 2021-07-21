<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Account
    Route::post('accounts/media', 'AccountApiController@storeMedia')->name('accounts.storeMedia');
    Route::apiResource('accounts', 'AccountApiController');

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

    // Template
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');

    // Balances
    Route::apiResource('balances', 'BalancesApiController');

    // Payment Status
    Route::apiResource('payment-statuses', 'PaymentStatusApiController');

    // Payment Method
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Labels
    Route::apiResource('labels', 'LabelsApiController');

    // Affiliate
    Route::post('affiliates/media', 'AffiliateApiController@storeMedia')->name('affiliates.storeMedia');
    Route::apiResource('affiliates', 'AffiliateApiController');

    // Advertiser
    Route::post('advertisers/media', 'AdvertiserApiController@storeMedia')->name('advertisers.storeMedia');
    Route::apiResource('advertisers', 'AdvertiserApiController');

    // Account Status
    Route::apiResource('account-statuses', 'AccountStatusApiController');

    // Address
    Route::apiResource('addresses', 'AddressApiController');
});
