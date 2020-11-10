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
Route::group(['middleware' => ['CheckLogin']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/show-list-post', 'ListUsersForPost@index');

    Route::group(['middleware' => ['CheckAdmin']], function () {
        Route::get('/admins', 'AdminsController@index');
        Route::get('/admins/activeAdmin', 'AdminsController@activeAdmin');
    });

    Route::group(['middleware' => ['CheckCoupon']], function () {
        Route::get('/coupons', 'CouponsController@index');
        Route::get('/coupons/activeCoupon', 'CouponsController@activeCoupon');
        Route::get('/coupons/post/{id}', 'CouponsController@show');
        Route::get('/coupons/cate', 'CouponsController@getCate');
        Route::get('/coupons/activeCate', 'CouponsController@activeCate');
        Route::get('/coupons/point', 'CouponsController@getPoint');
        Route::get('/coupons/activePoint', 'CouponsController@activePoint');
        Route::get('/coupons/used', 'CouponsController@getUsed');
        Route::get('/coupons/getRadius', 'CouponsController@getRadius');
        Route::get('/coupons/updateRadius', 'CouponsController@updateRadius');
    });

    Route::group(['middleware' => ['CheckTracking']], function () {
        Route::get('/campaign', 'TrackingController@indexCampaign');
        Route::get('/tracking', 'TrackingController@indexUsersTrackingData');
        Route::get('/campaign/updateCampaign', 'TrackingController@updateCampaign');
        Route::get('/users-play', 'TrackingController@indexUsersPlay');
        Route::get('/users-play/updateUsersPlay', 'TrackingController@updateUsersPlay');
    });

    Route::get('/approved-post', 'TrackingController@approvedPost');

    Route::group(['middleware' => ['CheckUsers']], function () {
        Route::get('/users', 'UsersController@index');
        Route::get('/users/noti', 'UsersController@pushNoti');
        Route::get('/users/activePushNoti', 'UsersController@activePushNoti');
        Route::get('/users/status', 'UsersController@updateStatus');
        Route::get('/users/activePoint', 'UsersController@activePoint');
        Route::get('/users/point/video', 'TransactionVideoController@user_tracking_point_video');
        Route::get('/users/point/status/video', 'TransactionVideoController@updateStatus');
        Route::get('/app-info', 'UsersController@listAppInformation');
        Route::get('/actionAppInformation', 'UsersController@actionAppInformation');
    });

    Route::group(['middleware' => ['CheckTrans']], function () {
        Route::get('/transports', 'TransportsController@index');
        Route::get('/transports/getRadius', 'TransportsController@getRadius');
        Route::get('/transports/updateRadius', 'TransportsController@updateRadius');
        Route::get('/transports/status', 'TransportsController@updateStatus');
        Route::get('/transports/cate', 'TransportsController@getCate');
        Route::get('/transports/activeCate', 'TransportsController@activeCate');
        Route::get('/transports/type', 'TransportsController@getType');
        Route::get('/transports/activeType', 'TransportsController@activeType');
        Route::get('/transports/vehicle', 'TransportsController@getVehicle');
        Route::get('/transports/activeVehicle', 'TransportsController@activeVehicle');
        Route::get('/transports/post/{id}', 'TransportsController@show');
        Route::get('/transports/list-report', 'TransportsController@getPostReport');
        Route::get('/transports/list-report/{id}', 'TransportsController@showDetailReport');
        Route::get('/transports/report', 'TransportsController@getReport');
        Route::get('/transports/activeReport', 'TransportsController@activeReport');
    });

    Route::group(['middleware' => ['CheckLands']], function () {
        Route::get('/landhouses', 'LandHousesController@index');
        Route::get('/landhouses/post/{id}', 'LandHousesController@show');
        Route::get('/landhouses/status', 'LandHousesController@updateStatus');
        Route::get('/landhouses/cate', 'LandHousesController@getCate');
        Route::get('/landhouses/activeCate', 'LandHousesController@activeCate');
        Route::get('/landhouses/type', 'LandHousesController@getType');
        Route::get('/landhouses/activeType', 'LandHousesController@activeType');
        Route::get('/landhouses/getRadius', 'LandHousesController@getRadius');
        Route::get('/landhouses/updateRadius', 'LandHousesController@updateRadius');
        Route::get('/landhouses/report', 'LandHousesController@getReport');
        Route::get('/landhouses/activeReport', 'LandHousesController@activeReport');
        Route::get('/landhouses/list-report', 'LandHousesController@getPostReport');
        Route::get('/landhouses/list-report/{id}', 'LandHousesController@showDetailReport');
    });

    Route::group(['middleware' => ['CheckRecrm']], function () {
        Route::get('/recruitments', 'RecruitmentsController@index');
        Route::get('/recruitments/post/{id}', 'RecruitmentsController@show');
        Route::get('/recruitments/status', 'RecruitmentsController@updateStatus');
        Route::get('/recruitments/cate', 'RecruitmentsController@getCate');
        Route::get('/recruitments/activeCate', 'RecruitmentsController@activeCate');
        Route::get('/recruitments/type', 'RecruitmentsController@getType');
        Route::get('/recruitments/activeType', 'RecruitmentsController@activeType');
        Route::get('/recruitments/getRadius', 'RecruitmentsController@getRadius');
        Route::get('/recruitments/updateRadius', 'RecruitmentsController@updateRadius');
        Route::get('/recruitments/report', 'RecruitmentsController@getReport');
        Route::get('/recruitments/activeReport', 'RecruitmentsController@activeReport');
        Route::get('/recruitments/list-report', 'RecruitmentsController@getPostReport');
        Route::get('/recruitments/list-report/{id}', 'RecruitmentsController@showDetailReport');
    });

    Route::group(['middleware' => ['CheckNails']], function () {
        Route::get('/nails', 'NailsController@index');
        Route::get('/nails/post/{id}', 'NailsController@show');
        Route::get('/nails/status', 'NailsController@updateStatus');
        Route::get('/nails/cate', 'NailsController@getCate');
        Route::get('/nails/activeCate', 'NailsController@activeCate');
        Route::get('/nails/type', 'NailsController@getType');
        Route::get('/nails/activeType', 'NailsController@activeType');
        Route::get('/nails/getRadius', 'NailsController@getRadius');
        Route::get('/nails/updateRadius', 'NailsController@updateRadius');
        Route::get('/nails/report', 'NailsController@getReport');
        Route::get('/nails/activeReport', 'NailsController@activeReport');
        Route::get('/nails/list-report', 'NailsController@getPostReport');
        Route::get('/nails/list-report/{id}', 'NailsController@showDetailReport');
    });

    Route::group(['middleware' => ['CheckAds']], function () {
        Route::get('/ads', 'AdsController@index');
        Route::resource('/banner', 'BannerController');
        Route::resource('/video', 'TransactionVideoController');
        Route::get('/ads/activeAds', 'AdsController@activeAds');
        Route::get('/ads/transports', 'AdsController@indexTrans');
        Route::get('/ads/landhouses', 'AdsController@indexLands');
        Route::get('/ads/recruitments', 'AdsController@indexRecuis');
        Route::get('/ads/nails', 'AdsController@indexNails');
        Route::get('/ads/shops', 'AdsController@indexShops');
        Route::get('/ads/tours', 'AdsController@indexTours');
        Route::get('/ads/options/status', 'AdsController@updateStatus');
        Route::get('/ads/getRadius', 'AdsController@getRadius');
        Route::get('/ads/updateRadius', 'AdsController@updateRadius');
    });

    Route::group(['middleware' => ['CheckTours']], function () {
        Route::get('/tours', 'ToursController@index');
        Route::get('/tours/post/{id}', 'ToursController@show');
        Route::get('/tours/status', 'ToursController@updateStatus');
        Route::get('/tours/cate', 'ToursController@getCate');
        Route::get('/tours/activeCate', 'ToursController@activeCate');
        Route::get('/tours/type', 'ToursController@getType');
        Route::get('/tours/activeType', 'ToursController@activeType');
        Route::get('/tours/getRadius', 'ToursController@getRadius');
        Route::get('/tours/updateRadius', 'ToursController@updateRadius');
        Route::get('/tours/report', 'ToursController@getReport');
        Route::get('/tours/activeReport', 'ToursController@activeReport');
        Route::get('/tours/list-report', 'ToursController@getPostReport');
        Route::get('/tours/list-report/{id}', 'ToursController@showDetailReport');
    });

    Route::group(['middleware' => ['CheckShops']], function () {
        Route::get('/shops', 'ShopsController@index');
        Route::get('/shops/post/{id}', 'ShopsController@show');
        Route::get('/shops/status', 'ShopsController@updateStatus');
        Route::get('/shops/cate', 'ShopsController@getCate');
        Route::get('/shops/activeCate', 'ShopsController@activeCate');
        Route::get('/shops/type', 'ShopsController@getType');
        Route::get('/shops/activeType', 'ShopsController@activeType');
        Route::get('/shops/getRadius', 'ShopsController@getRadius');
        Route::get('/shops/updateRadius', 'ShopsController@updateRadius');
        Route::get('/shops/report', 'ShopsController@getReport');
        Route::get('/shops/activeReport', 'ShopsController@activeReport');
        Route::get('/shops/list-report', 'ShopsController@getPostReport');
        Route::get('/shops/list-report/{id}', 'ShopsController@showDetailReport');
    });

    Route::group(['middleware' => ['CheckPromotions']], function () {
        Route::get('/promotions', 'PromotionsController@index');
        Route::get('/promotions/post/{id}', 'PromotionsController@show');
        Route::get('/promotions/status', 'PromotionsController@updateStatus');
        Route::get('/promotions/cate', 'PromotionsController@getCate');
        Route::get('/promotions/activeCate', 'PromotionsController@activeCate');
        Route::get('/promotions/type', 'PromotionsController@getType');
        Route::get('/promotions/activeType', 'PromotionsController@activeType');
        Route::get('/promotions/getRadius', 'PromotionsController@getRadius');
        Route::get('/promotions/updateRadius', 'PromotionsController@updateRadius');
        Route::get('/promotions/report', 'PromotionsController@getReport');
        Route::get('/promotions/activeReport', 'PromotionsController@activeReport');
        Route::get('/promotions/list-report', 'PromotionsController@getPostReport');
        Route::get('/promotions/list-report/{id}', 'PromotionsController@showDetailReport');
    });

});
        
    Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
    Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    