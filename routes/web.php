<?php

use App\Http\Controllers\PostController;

Route::get('mail/send-grid', [PostController::class, 'sendMail']);



Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
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

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Account
    Route::delete('accounts/destroy', 'AccountController@massDestroy')->name('accounts.massDestroy');
    Route::resource('accounts', 'AccountController');

    // Offers
    Route::delete('offers/destroy', 'OffersController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OffersController');

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

    // Payment Status
    Route::delete('payment-statuses/destroy', 'PaymentStatusController@massDestroy')->name('payment-statuses.massDestroy');
    Route::resource('payment-statuses', 'PaymentStatusController');

    // Payment Method
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

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