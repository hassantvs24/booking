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


/*
 * ==================== Frontend ====================
 */
    Route::get('/', 'Frontend\HomeController@index')->name('front.home');

    Route::get('about/', 'Frontend\AboutController@index')->name('front.about');

    Route::get('services/', 'Frontend\ServicesController@index')->name('front.service');

    Route::get('event/', 'Frontend\EventController@index')->name('front.event');
    Route::get('search/', 'Frontend\EventController@search')->name('front.search');
    Route::get('event/{id}', 'Frontend\EventController@single')->name('front.single');

    Route::get('light-box/add-cart', 'Frontend\EventController@show_light_box')->name('front.service-show-box');


    Route::get('gallerys/', 'Frontend\GalleryController@index')->name('front.gallery');

    Route::get('contact/', 'Frontend\ContactController@index')->name('front.contact');


    Route::post('checkout/add-cart', 'Frontend\CheckoutController@add_cart')->name('front.add-cart');

    Route::group(['middleware' => 'customer'], function () {
        Route::get('checkout/', 'Frontend\CheckoutController@index')->name('front.checkout');
        Route::post('checkout/', 'Frontend\CheckoutController@checkout')->name('front.checkout-save');
        Route::get('checkout/del-cart/{id}', 'Frontend\CheckoutController@del_cart')->name('front.del-cart');

        Route::get('customer/', 'Frontend\CustomerController@index')->name('front.user');
        Route::post('review/', 'Frontend\CustomerController@review_save')->name('front.review-save');
    });

    Route::get('login-register/', 'Frontend\LoginRegisterController@index')->name('front.login-register');


/*
 * ==================== /Frontend ====================
 */


Route::group(['middleware' => ['auth', 'non_customer']], function () {
    Route::prefix('admin')->group(function () {
        /*
         * ==================== Dashboard ====================
         */
        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');
        Route::get('event_calender/', 'Dashboard\DashboardController@event_calender')->name('event-calender-api');
        /*
         * ==================== /Dashboard ====================
         */

        /*
         * ==================== Booking ====================
         */

        Route::get('booking/list', 'Booking\BookingController@index')->name('new-booking')->middleware('access');
        Route::get('booking/{id}', 'Booking\BookingController@show_booking')->name('booking-show')->middleware('access');
        Route::post('booking/status', 'Booking\BookingController@status')->name('booking-status')->middleware('access');


        Route::get('booking/running/task', 'Booking\TaskController@index')->name('booking-task')->middleware('access');
        Route::get('booking/task/{id}', 'Booking\TaskController@change_status')->name('task-complete')->middleware('access');

        Route::get('booking/old/archive', 'Booking\OldBookingController@index')->name('old-booking')->middleware('access');

        /*
         * ==================== /Booking ====================
         */


        /*
         * ==================== Service ====================
         */

        Route::get('service', 'Service\ServiceController@index')->name('service')->middleware('access');
        Route::post('service', 'Service\ServiceController@save')->name('service-save')->middleware('access');
        Route::put('service/{id}', 'Service\ServiceController@edit')->name('service-edit')->middleware('access');
        Route::get('service/del/{id}', 'Service\ServiceController@del')->name('service-del')->middleware('access');
        Route::get('service/save', 'Service\ServiceController@go_save')->name('service-go-save')->middleware('access');
        Route::get('service/show/{id}', 'Service\ServiceController@go_edit')->name('service-go-edit')->middleware('access');
        Route::get('service/del/photo/{id}/{key}', 'Service\ServiceController@del_photo')->name('service-del-photo')->middleware('access');

        /*
         * ==================== /Service ====================
         */

        /*
         * ==================== Settings ====================
         */

        Route::get('settings/facility', 'Settings\FacilityController@index')->name('facility')->middleware('access');
        Route::post('settings/facility', 'Settings\FacilityController@save')->name('facility-save')->middleware('access');
        Route::put('settings/facility/{id}', 'Settings\FacilityController@edit')->name('facility-edit')->middleware('access');
        Route::get('settings/facility/{id}', 'Settings\FacilityController@del')->name('facility-del')->middleware('access');

        Route::get('settings/location', 'Settings\LocationController@index')->name('location')->middleware('access');
        Route::post('settings/location', 'Settings\LocationController@save')->name('location-save')->middleware('access');
        Route::put('settings/location/{id}', 'Settings\LocationController@edit')->name('location-edit')->middleware('access');
        Route::get('settings/location/{id}', 'Settings\LocationController@del')->name('location-del')->middleware('access');

        Route::get('settings/rules', 'Settings\RulesController@index')->name('rules')->middleware('access');
        Route::post('settings/rules', 'Settings\RulesController@save')->name('rules-save')->middleware('access');
        Route::put('settings/rules/{id}', 'Settings\RulesController@edit')->name('rules-edit')->middleware('access');
        Route::get('settings/rules/{id}', 'Settings\RulesController@del')->name('rules-del')->middleware('access');

        Route::get('settings/time-slot', 'Settings\TimeSlotController@index')->name('time-slot')->middleware('access');
        Route::post('settings/time-slot', 'Settings\TimeSlotController@save')->name('time-slot-save')->middleware('access');
        Route::put('settings/time-slot/{id}', 'Settings\TimeSlotController@edit')->name('time-slot-edit')->middleware('access');
        Route::get('settings/time-slot/{id}', 'Settings\TimeSlotController@del')->name('time-slot-del')->middleware('access');

        Route::get('settings/party', 'Settings\PartyController@index')->name('party')->middleware('access');
        Route::post('settings/party', 'Settings\PartyController@save')->name('party-save')->middleware('access');
        Route::put('settings/party/{id}', 'Settings\PartyController@edit')->name('party-edit')->middleware('access');
        Route::get('settings/party/{id}', 'Settings\PartyController@del')->name('party-del')->middleware('access');

        /*
         * ==================== /Settings ====================
         */

        /*
         * ==================== Users ====================
         */

        Route::get('users/list', 'Users\UserController@index')->name('users-list')->middleware('access');
        Route::post('users/', 'Users\UserController@save')->name('users-save')->middleware('access');
        Route::put('users/{id}', 'Users\UserController@edit')->name('users-edit')->middleware('access');
        Route::get('users/del/{id}', 'Users\UserController@del')->name('users-del')->middleware('access');

        Route::get('users/role', 'Users\UserRoleController@index')->name('user-role')->middleware('access');
        Route::post('users/role', 'Users\UserRoleController@save')->name('user-role-save')->middleware('access');
        Route::put('users/role/{id}', 'Users\UserRoleController@edit')->name('user-role-edit')->middleware('access');
        Route::get('users/role/{id}', 'Users\UserRoleController@del')->name('user-role-del')->middleware('access');
        Route::get('users/role/setup/{id}', 'Users\UserRoleController@show')->name('user-permission-show')->middleware('access');
        Route::post('users/role/setup/', 'Users\UserRoleController@permission')->name('user-permission-update')->middleware('access');

        /*
         * ==================== /Users ====================
         */

    });

});




//==================== Toggle Sidebar =======================
Route::get('savestate', 'MainController@saveState');
//Route::get('key', 'MainController@key');
//==================== /Toggle Sidebar =======================

Route::get('/catch', 'MainController@refresh')->name('front.refresh');
Route::get('not-found/', 'MainController@not_found')->name('front.not-found');
Route::get('access/', 'MainController@access')->name('front.access');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
