<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Affiliate
    Route::delete('affiliates/destroy', 'AffiliateController@massDestroy')->name('affiliates.massDestroy');
    Route::post('affiliates/media', 'AffiliateController@storeMedia')->name('affiliates.storeMedia');
    Route::post('affiliates/ckmedia', 'AffiliateController@storeCKEditorImages')->name('affiliates.storeCKEditorImages');
    Route::resource('affiliates', 'AffiliateController');
    
    Route::get('affiliate/{status?}', 'AffiliateController@index');

    // Account Status
    Route::delete('account-statuses/destroy', 'AccountStatusController@massDestroy')->name('account-statuses.massDestroy');
    Route::resource('account-statuses', 'AccountStatusController');

    // Advertiser
    Route::delete('advertisers/destroy', 'AdvertiserController@massDestroy')->name('advertisers.massDestroy');
    Route::post('advertisers/media', 'AdvertiserController@storeMedia')->name('advertisers.storeMedia');
    Route::post('advertisers/ckmedia', 'AdvertiserController@storeCKEditorImages')->name('advertisers.storeCKEditorImages');
    Route::resource('advertisers', 'AdvertiserController');

    Route::get('advertiser/{status?}', 'AdvertiserController@index');

    // Label
    Route::delete('labels/destroy', 'LabelController@massDestroy')->name('labels.massDestroy');
    Route::resource('labels', 'LabelController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    Route::get('offer/{status?}', 'OfferController@index');

    // Balances
    Route::delete('balances/destroy', 'BalancesController@massDestroy')->name('balances.massDestroy');
    Route::resource('balances', 'BalancesController');

    // Payment Status
    Route::delete('payment-statuses/destroy', 'PaymentStatusController@massDestroy')->name('payment-statuses.massDestroy');
    Route::resource('payment-statuses', 'PaymentStatusController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    // Mail Room
    Route::delete('mail-rooms/destroy', 'MailRoomController@massDestroy')->name('mail-rooms.massDestroy');
    Route::resource('mail-rooms', 'MailRoomController');

    // Template
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
=======
>>>>>>> parent of 232c5d7 (pushing new crud files and migrations)
    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Affiliate
    Route::delete('affiliates/destroy', 'AffiliateController@massDestroy')->name('affiliates.massDestroy');
    Route::post('affiliates/media', 'AffiliateController@storeMedia')->name('affiliates.storeMedia');
    Route::post('affiliates/ckmedia', 'AffiliateController@storeCKEditorImages')->name('affiliates.storeCKEditorImages');
    Route::resource('affiliates', 'AffiliateController');

    // Account Status
    Route::delete('account-statuses/destroy', 'AccountStatusController@massDestroy')->name('account-statuses.massDestroy');
    Route::resource('account-statuses', 'AccountStatusController');

    // Advertiser
    Route::delete('advertisers/destroy', 'AdvertiserController@massDestroy')->name('advertisers.massDestroy');
    Route::post('advertisers/media', 'AdvertiserController@storeMedia')->name('advertisers.storeMedia');
    Route::post('advertisers/ckmedia', 'AdvertiserController@storeCKEditorImages')->name('advertisers.storeCKEditorImages');
    Route::resource('advertisers', 'AdvertiserController');

    // Label
    Route::delete('labels/destroy', 'LabelController@massDestroy')->name('labels.massDestroy');
    Route::resource('labels', 'LabelController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    // Balances
    Route::delete('balances/destroy', 'BalancesController@massDestroy')->name('balances.massDestroy');
    Route::resource('balances', 'BalancesController');

    // Payment Status
    Route::delete('payment-statuses/destroy', 'PaymentStatusController@massDestroy')->name('payment-statuses.massDestroy');
    Route::resource('payment-statuses', 'PaymentStatusController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Mail Room
    Route::delete('mail-rooms/destroy', 'MailRoomController@massDestroy')->name('mail-rooms.massDestroy');
    Route::resource('mail-rooms', 'MailRoomController');

    // Template
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
