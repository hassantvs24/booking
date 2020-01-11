<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

    /*
     * ==================== Service ====================
     */

    Route::get('service', 'Service\ServiceController@index')->name('service');
    Route::post('service', 'Service\ServiceController@save')->name('service-save');
    Route::put('service/{id}', 'Service\ServiceController@edit')->name('service-edit');
    Route::get('service/del/{id}', 'Service\ServiceController@del')->name('service-del');
    Route::get('service/save', 'Service\ServiceController@go_save')->name('service-go-save');
    Route::get('service/show/{id}', 'Service\ServiceController@go_edit')->name('service-go-edit');
    Route::get('service/del/photo/{id}/{key}', 'Service\ServiceController@del_photo')->name('service-del-photo');

    /*
     * ==================== /Service ====================
     */

    /*
     * ==================== Settings ====================
     */

    Route::get('settings/facility', 'Settings\FacilityController@index')->name('facility');
    Route::post('settings/facility', 'Settings\FacilityController@save')->name('facility-save');
    Route::put('settings/facility/{id}', 'Settings\FacilityController@edit')->name('facility-edit');
    Route::get('settings/facility/{id}', 'Settings\FacilityController@del')->name('facility-del');

    Route::get('settings/location', 'Settings\LocationController@index')->name('location');
    Route::post('settings/location', 'Settings\LocationController@save')->name('location-save');
    Route::put('settings/location/{id}', 'Settings\LocationController@edit')->name('location-edit');
    Route::get('settings/location/{id}', 'Settings\LocationController@del')->name('location-del');

    Route::get('settings/rules', 'Settings\RulesController@index')->name('rules');
    Route::post('settings/rules', 'Settings\RulesController@save')->name('rules-save');
    Route::put('settings/rules/{id}', 'Settings\RulesController@edit')->name('rules-edit');
    Route::get('settings/rules/{id}', 'Settings\RulesController@del')->name('rules-del');

    Route::get('settings/time-slot', 'Settings\TimeSlotController@index')->name('time-slot');
    Route::post('settings/time-slot', 'Settings\TimeSlotController@save')->name('time-slot-save');
    Route::put('settings/time-slot/{id}', 'Settings\TimeSlotController@edit')->name('time-slot-edit');
    Route::get('settings/time-slot/{id}', 'Settings\TimeSlotController@del')->name('time-slot-del');

    Route::get('settings/party', 'Settings\PartyController@index')->name('party');
    Route::post('settings/party', 'Settings\PartyController@save')->name('party-save');
    Route::put('settings/party/{id}', 'Settings\PartyController@edit')->name('party-edit');
    Route::get('settings/party/{id}', 'Settings\PartyController@del')->name('party-del');

    /*
     * ==================== /Settings ====================
     */

    /*
     * ==================== Users ====================
     */

    Route::get('users/list', 'Users\UserController@index')->name('users');
    Route::post('users/', 'Users\UserController@save')->name('users-save');
    Route::put('users/{id}', 'Users\UserController@edit')->name('users-edit');
    Route::get('users/del/{id}', 'Users\UserController@del')->name('users-del');

    Route::get('users/role', 'Users\UserRoleController@index')->name('user-role');
    Route::post('users/role', 'Users\UserRoleController@save')->name('user-role-save');
    Route::put('users/role/{id}', 'Users\UserRoleController@edit')->name('user-role-edit');
    Route::get('users/role/{id}', 'Users\UserRoleController@del')->name('user-role-del');
    Route::get('users/role/setup/{id}', 'Users\UserRoleController@show')->name('user-permission-show');
    Route::post('users/role/setup/', 'Users\UserRoleController@permission')->name('user-permission-update');

    /*
     * ==================== /Users ====================
     */

});


//==================== Toggle Sidebar =======================
Route::get('savestate', 'MainController@saveState');
//Route::get('key', 'MainController@key');
//==================== /Toggle Sidebar =======================

Route::get('/catch', function () {
    Artisan::call('config:cache');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
