<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::get('invitations/{invitation_id}/{action}', 'AcceptController@accept')->name('invitations.send');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::get('events/{event_id}/send', ['uses' => 'Admin\EventsController@send', 'as' => 'events.send']);
    Route::resource('events', 'Admin\EventsController');
    Route::post('events_mass_destroy', ['uses' => 'Admin\EventsController@massDestroy', 'as' => 'events.mass_destroy']);
    Route::post('events_restore/{id}', ['uses' => 'Admin\EventsController@restore', 'as' => 'events.restore']);
    Route::delete('events_perma_del/{id}', ['uses' => 'Admin\EventsController@perma_del', 'as' => 'events.perma_del']);
    Route::get('invitations/{invitation_id}/send', ['uses' => 'Admin\InvitationsController@send', 'as' => 'invitations.send']);
    Route::get('invitations/import', ['uses' => 'Admin\InvitationsController@import', 'as' => 'invitations.import']);
    Route::post('invitations/import_store', ['uses' => 'Admin\InvitationsController@import_store', 'as' => 'invitations.import_store']);
    Route::resource('invitations', 'Admin\InvitationsController');
    Route::post('invitations_mass_destroy', ['uses' => 'Admin\InvitationsController@massDestroy', 'as' => 'invitations.mass_destroy']);
    Route::post('invitations_restore/{id}', ['uses' => 'Admin\InvitationsController@restore', 'as' => 'invitations.restore']);
    Route::delete('invitations_perma_del/{id}', ['uses' => 'Admin\InvitationsController@perma_del', 'as' => 'invitations.perma_del']);


});
