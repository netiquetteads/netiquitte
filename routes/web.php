<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();


Route::get('/unsubscribe', 'UnsubscribeController@index')->name('unsubscribe');
Route::get('/success', 'UnsubscribeController@success')->name('success');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Affiliate
    Route::delete('affiliates/destroy', 'AffiliateController@massDestroy')->name('affiliates.massDestroy');
    Route::post('affiliates/media', 'AffiliateController@storeMedia')->name('affiliates.storeMedia');
    Route::post('affiliates/ckmedia', 'AffiliateController@storeCKEditorImages')->name('affiliates.storeCKEditorImages');
    Route::resource('affiliates', 'AffiliateController');
    Route::get('affiliate/{status?}', 'AffiliateController@index');
    Route::get('sendmail', 'AffiliateController@sendMail');

    // Account Status
    Route::delete('account-statuses/destroy', 'AccountStatusController@massDestroy')->name('account-statuses.massDestroy');
    Route::resource('account-statuses', 'AccountStatusController');

    // Advertiser
    Route::delete('advertisers/destroy', 'AdvertiserController@massDestroy')->name('advertisers.massDestroy');
    Route::post('advertisers/media', 'AdvertiserController@storeMedia')->name('advertisers.storeMedia');
    Route::post('advertisers/ckmedia', 'AdvertiserController@storeCKEditorImages')->name('advertisers.storeCKEditorImages');
    Route::resource('advertisers', 'AdvertiserController');
    Route::get('advertiser/{status?}', 'AdvertiserController@index');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);
 
    // Label
    Route::delete('labels/destroy', 'LabelController@massDestroy')->name('labels.massDestroy');
    Route::resource('labels', 'LabelController');

    // Offers
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');
    Route::get('offer/{status?}', 'OfferController@index');

    // Mail Room
    Route::delete('mail-rooms/destroy', 'MailRoomController@massDestroy')->name('mail-rooms.massDestroy');
    Route::resource('mail-rooms', 'MailRoomController');

    // Template
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

    // Balances
    Route::delete('balances/destroy', 'BalancesController@massDestroy')->name('balances.massDestroy');
    Route::resource('balances', 'BalancesController');
    Route::post('getTabledata', 'BalancesController@getTabledata')->name('balances.getTabledata');
    Route::post('getModeldata', 'BalancesController@getModeldata')->name('balances.getModeldata');
    Route::post('SaveAccounting', 'BalancesController@SaveAccounting')->name('balances.SaveAccounting');
    Route::post('SavePaymentStatus', 'BalancesController@SavePaymentStatus')->name('balances.SavePaymentStatus');
    Route::post('SavePaymentInfo', 'BalancesController@SavePaymentInfo')->name('balances.SavePaymentInfo');
    Route::post('SaveNotes', 'BalancesController@SaveNotes')->name('balances.SaveNotes');

    // Payment Status
    Route::delete('payment-statuses/destroy', 'PaymentStatusController@massDestroy')->name('payment-statuses.massDestroy');
    Route::resource('payment-statuses', 'PaymentStatusController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Template
    Route::delete('templates/destroy', 'TemplateController@massDestroy')->name('templates.massDestroy');
    Route::post('templates/media', 'TemplateController@storeMedia')->name('templates.storeMedia');
    Route::post('templates/ckmedia', 'TemplateController@storeCKEditorImages')->name('templates.storeCKEditorImages');
    Route::resource('templates', 'TemplateController');

    // Campaign Results
    Route::delete('campaign-results/destroy', 'CampaignResultsController@massDestroy')->name('campaign-results.massDestroy');
    Route::resource('campaign-results', 'CampaignResultsController');

    // Results Tracking
    Route::delete('results-trackings/destroy', 'ResultsTrackingController@massDestroy')->name('results-trackings.massDestroy');
    Route::resource('results-trackings', 'ResultsTrackingController');

    // Campaign
    Route::delete('campaigns/destroy', 'CampaignController@massDestroy')->name('campaigns.massDestroy');
    Route::post('campaigns/media', 'CampaignController@storeMedia')->name('campaigns.storeMedia');
    Route::post('campaigns/ckmedia', 'CampaignController@storeCKEditorImages')->name('campaigns.storeCKEditorImages');
    Route::resource('campaigns', 'CampaignController');
    Route::post('getTemplateData', 'CampaignController@getTemplateData')->name('campaigns.getTemplateData');
    Route::post('loadTemplate', 'CampaignController@loadTemplate')->name('campaigns.loadTemplate');

    // Subscriber
    Route::delete('subscribers/destroy', 'SubscriberController@massDestroy')->name('subscribers.massDestroy');
    Route::resource('subscribers', 'SubscriberController');

    // Subscription
    Route::delete('subscriptions/destroy', 'SubscriptionController@massDestroy')->name('subscriptions.massDestroy');
    Route::resource('subscriptions', 'SubscriptionController');

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


Route::get('/r', function ()
{
    function philsroutes()
    {
        $routeCollection = Route::getRoutes();

        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">';
        echo "<div class='container'><div class='col-md-12'><a target='_blank' href='". url('/') ."' type='button' class='btn btn-primary' style='position: fixed;top:5rem;right:3em;'>Live Site</a><table class='table table-striped' style='width:100%'>";
        echo '<tr>';
        //  echo '<td><h4>Domain</h4></td>';
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='30%'><h4>URL</h4></td>";
        echo "<td width='30%'><h4>Route</h4></td>";
        echo "<td width='30%'><h4>Corresponding Action</h4></td>";
        echo '</tr>';

        foreach ($routeCollection as $value) {
            echo '<tr>';
            //    echo '<td>lcadashboard.com</td>';
            echo '<td>'.$value->methods()[0].'</td>';
            echo "<td><a href='".$value->uri()."' target='_blank'>".$value->uri().'</a> </td>';
            echo '<td>'.$value->getName().'</td>';
            echo '<td>'.$value->getActionName().'</td>';
            echo '</tr>';
        }

        echo '</table></div></div>';
        echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>';
    }

    return philsroutes();

})->name('assigned-routes');