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










// Hospital

Route::get('/hospitals', 'Api\HospitalController@index');
Route::get('/hospitals/{hospital}', 'Api\HospitalController@show');
Route::post('/hospitals/{hospital}/users/{id}/fav', 'Api\HospitalController@fav');
Route::delete('/hospitals/{hospital}/users/{id}/fav', 'Api\HospitalController@unfav');
Route::post('/hospitals/{hospital}/users/{id}/rate', 'Api\HospitalController@storeRate');
Route::post('/hospitals/{hospital}/users/{id}/view', 'Api\HospitalController@view');
Route::post('/hospitals/search', 'Api\HospitalController@search');


// Beauty Center

Route::get('/beauty-centers', 'Api\BeautyCenterController@index');
Route::get('/beauty-centers/{beautyCenter}', 'Api\BeautyCenterController@show');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/fav', 'Api\BeautyCenterController@fav');
Route::delete('/beauty-centers/{beautyCenter}/users/{id}/fav', 'Api\BeautyCenterController@unfav');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/rate', 'Api\BeautyCenterController@storeRate');
Route::post('/beauty-centers/{beautyCenter}/users/{id}/view', 'Api\BeautyCenterController@view');
Route::post('/beauty-centers/search', 'Api\BeautyCenterController@search');


// Clinic

Route::get('/clinics', 'Api\ClinicController@index');
Route::get('/clinics/{clinic}', 'Api\ClinicController@show');
Route::post('/clinics/{clinic}/users/{id}/fav', 'Api\ClinicController@fav');
Route::delete('/clinics/{clinic}/users/{id}/fav', 'Api\ClinicController@unfav');
Route::post('/clinics/{clinic}/users/{id}/rate', 'Api\ClinicController@storeRate');
Route::post('/clinics/{clinic}/users/{id}/view', 'Api\ClinicController@view');
Route::post('/clinics/search', 'Api\ClinicController@search');


// Pharmacy

Route::get('/pharmacies', 'Api\PharmacyController@index');
Route::get('/pharmacies/{pharmacy}', 'Api\PharmacyController@show');
Route::post('/pharmacies/{pharmacy}/users/{id}/fav', 'Api\PharmacyController@fav');
Route::delete('/pharmacies/{pharmacy}/users/{id}/fav', 'Api\PharmacyController@unfav');
Route::post('/pharmacies/{pharmacy}/users/{id}/rate', 'Api\PharmacyController@storeRate');
Route::post('/pharmacies/{pharmacy}/users/{id}/view', 'Api\PharmacyController@view');


// Job Ad

Route::get('/job-ads', 'Api\JobAdController@index');
Route::get('/job-ads/{jobAd}', 'Api\JobAdController@show');
Route::post('/job-ads/{jobAd}/users/{id}/fav', 'Api\JobAdController@fav');
Route::delete('/job-ads/{jobAd}/users/{id}/fav', 'Api\JobAdController@unfav');
Route::post('/job-ads/{jobAd}/users/{id}/view', 'Api\JobAdController@view');
Route::post('/job-ads/search', 'Api\JobAdController@search');


// Product Ad

Route::get('/product-ads', 'Api\ProductAdController@index');
Route::get('/product-ads/{productAd}', 'Api\ProductAdController@show');
Route::post('/product-ads/{productAd}/users/{id}/fav', 'Api\ProductAdController@fav');
Route::delete('/product-ads/{productAd}/users/{id}/fav', 'Api\ProductAdController@unfav');
Route::post('/product-ads/{productAd}/users/{id}/view', 'Api\ProductAdController@view');