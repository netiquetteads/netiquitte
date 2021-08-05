<?php

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {

    //Everflow Apis
    Route::post('all-advertiser', 'EverflowApiController@getAllAdvertiser')->name('advertiser.getAllAdvertiser');
    Route::post('all-affiliates', 'EverflowApiController@getAllAffiliates')->name('advertiser.getAllAffiliates');
    Route::post('all-offers', 'EverflowApiController@getAllOffers')->name('advertiser.getAllOffers');

    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Team
    Route::apiResource('teams', 'TeamApiController');

    // Account
    Route::apiResource('accounts', 'AccountApiController');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

=======

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======

    // Offers
    Route::apiResource('offers', 'OffersApiController');

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
    // Template
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');

    // Balances
    Route::apiResource('balances', 'BalancesApiController');

    // Payment Status
    Route::apiResource('payment-statuses', 'PaymentStatusApiController');

    // Payment Method
    Route::apiResource('payment-methods', 'PaymentMethodApiController');
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

    // Mail Room
    Route::apiResource('mail-rooms', 'MailRoomApiController');

    // Template
    Route::post('templates/media', 'TemplateApiController@storeMedia')->name('templates.storeMedia');
    Route::apiResource('templates', 'TemplateApiController');
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
});
