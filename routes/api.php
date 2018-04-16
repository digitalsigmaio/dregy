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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/hospitals', 'Api\HospitalController@index');
Route::get('/clinics', 'Api\ClinicController@index');
Route::get('/pharmacies', 'Api\PharmacyController@index');

Route::get('/product-ads', 'Api\ProductAdController@index');
Route::get('/job-ads', 'Api\JobAdController@index');

// Beauty Center

Route::get('/beauty-centers', 'Api\BeautyCenterController@index');
Route::get('/beauty-centers/{beautyCenter}', 'Api\BeautyCenterController@show');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/fav', 'Api\BeautyCenterController@fav');
Route::delete('/beauty-centers/{beautyCenter}/users/{id}/fav', 'Api\BeautyCenterController@unfav');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/rate', 'Api\BeautyCenterController@storeRate');
Route::put('/beauty-centers/{beautyCenter}/users/{id}/rate', 'Api\BeautyCenterController@updateRate');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/view', 'Api\BeautyCenterController@view');

