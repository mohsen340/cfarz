<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//cafe arz app api
Route::get('Currencys','API\CurrencyController@GetOrginalCurrency');
Route::get('SCurrencys','API\SourceCurrencyController@GetOrginalCurrency');
Route::get('DCurrencys','API\DigitalCurrencyController@GetOrginalCurrency');
Route::get('Golds','API\GoldController@GetOrginalCurrency');
Route::get('Coins','API\CoinsController@GetOrginalCurrency');
Route::get('Mobiles','API\MobilesController@GetOrginalCurrency');
Route::get('Cars','API\CarsController@GetOrginalCurrency');
Route::get('NewsAndPapers','API\NewsController@GetOrginalCurrency');
Route::get('AppDetail','API\NewsController@GetOriginalApp');
Route::get('Subscribe/{pushid}/{idsubscribe}/{table}/{type}','API\NewsController@CreateSubscribe');





//shop app routes
Route::middleware('app_key')->group(function () {
  //user auth routes
  Route::post('v1/login', 'Shop\Api\PassportController@login');
  Route::post('v1/register', 'Shop\Api\PassportController@register');
  Route::middleware('auth:api')->group(function () {
    Route::get('v1/user', 'Shop\Api\PassportController@user');
    Route::post('v1/logout', 'Shop\Api\PassportController@logout');
  });


  Route::get('v1/products/{type}', 'Shop\Api\ApplicationDataController@products');
  Route::get('v1/product/{id}', 'Shop\Api\ApplicationDataController@product');
  Route::get('v1/orders', 'Shop\Api\ApplicationDataController@orders')->middleware('auth:api');

  Route::post('v1/product-shop', 'Shop\Api\PaymentController@productShop')->middleware('auth:api');



});

//bank verify payment
Route::get('v1/product-shop-verify/{request_id}', 'Shop\Api\PaymentController@productShopVerify')->name('product-shop-verify');



//new app details
Route::get('anti-virus-detail', 'NewAppsDataController@antiVirus');
Route::get('optimizer-detail', 'NewAppsDataController@optimizer');
