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

    // Account
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
});
