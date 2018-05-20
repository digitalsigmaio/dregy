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

Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::post('/auth/{provider}/callback', 'Auth\AuthController@appHandleProviderCallback');




// User

Route::post('/login', 'Auth\ApiLoginController@login');
Route::post('/register', 'Auth\ApiRegisterController@register');
/* user favorites */
Route::get('/users/{user}/favorite-hospitals', 'UserController@favoriteHospitals');
Route::get('/users/{user}/favorite-clinics', 'UserController@favoriteClinics');
Route::get('/users/{user}/favorite-cosmetic-clinics', 'UserController@favoriteCosmeticClinics');
Route::get('/users/{user}/favorite-pharmacies', 'UserController@favoritePharmacies');
Route::get('/users/{user}/favorite-products', 'UserController@favoriteProducts');
Route::get('/users/{user}/favorite-jobs', 'UserController@favoriteJobs');

// Hospital

Route::get('/hospitals', 'Api\HospitalController@index');
Route::get('/hospitals/{hospital}', 'Api\HospitalController@show');
Route::post('/hospitals/{hospital}/users/{id}/fav', 'Api\HospitalController@fav');
Route::delete('/hospitals/{hospital}/users/{id}/fav', 'Api\HospitalController@unfav');
Route::post('/hospitals/{hospital}/users/{id}/rate', 'Api\HospitalController@storeRate');
Route::post('/hospitals/{hospital}/view', 'Api\HospitalController@view');
Route::post('/hospitals/search', 'Api\HospitalController@search');


// Cosmetic Clinic

Route::get('/cosmetic-clinics', 'Api\CosmeticClinicController@index');
Route::get('/cosmetic-clinics/{cosmeticClinic}', 'Api\CosmeticClinicController@show');
Route::post('/cosmetic-clinics/{cosmeticClinic}/users/{id}/fav', 'Api\CosmeticClinicController@fav');
Route::delete('/cosmetic-clinics/{cosmeticClinic}/users/{id}/fav', 'Api\CosmeticClinicController@unfav');
Route::post('/cosmetic-clinics/{cosmeticClinic}/users/{id}/rate', 'Api\CosmeticClinicController@storeRate');
Route::post('/cosmetic-clinics/{cosmeticClinic}/view', 'Api\CosmeticClinicController@view');
Route::post('/cosmetic-clinics/search', 'Api\CosmeticClinicController@search');


// Clinic

Route::get('/clinics', 'Api\ClinicController@index');
Route::get('/clinics/{clinic}', 'Api\ClinicController@show');
Route::post('/clinics/{clinic}/users/{id}/fav', 'Api\ClinicController@fav');
Route::delete('/clinics/{clinic}/users/{id}/fav', 'Api\ClinicController@unfav');
Route::post('/clinics/{clinic}/users/{id}/rate', 'Api\ClinicController@storeRate');
Route::post('/clinics/{clinic}/view', 'Api\ClinicController@view');
Route::post('/clinics/search', 'Api\ClinicController@search');


// Pharmacy

Route::get('/pharmacies', 'Api\PharmacyController@index');
Route::get('/pharmacies/{pharmacy}', 'Api\PharmacyController@show');
Route::post('/pharmacies/{pharmacy}/users/{id}/fav', 'Api\PharmacyController@fav');
Route::delete('/pharmacies/{pharmacy}/users/{id}/fav', 'Api\PharmacyController@unfav');
Route::post('/pharmacies/{pharmacy}/users/{id}/rate', 'Api\PharmacyController@storeRate');
Route::post('/pharmacies/{pharmacy}/view', 'Api\PharmacyController@view');
Route::post('/pharmacies/search', 'Api\PharmacyController@search');


// Job Ad

Route::get('/job-ads', 'Api\JobAdController@index');
Route::get('/job-ads/{jobAd}', 'Api\JobAdController@show');
Route::post('/job-ads/{jobAd}/users/{id}/fav', 'Api\JobAdController@fav');
Route::delete('/job-ads/{jobAd}/users/{id}/fav', 'Api\JobAdController@unfav');
Route::post('/job-ads/{jobAd}/view', 'Api\JobAdController@view');
Route::post('/job-ads/search', 'Api\JobAdController@search');



// Product Ad

Route::get('/product-ads', 'Api\ProductAdController@index');
Route::get('/product-ads/{productAd}', 'Api\ProductAdController@show');
Route::post('/product-ads', 'Api\ProductAdController@store');
Route::post('/product-ads/{productAd}/users/{id}/fav', 'Api\ProductAdController@fav');
Route::delete('/product-ads/{productAd}/users/{id}/fav', 'Api\ProductAdController@unfav');
Route::post('/product-ads/{productAd}/view', 'Api\ProductAdController@view');
Route::post('/product-ads/search', 'Api\ProductAdController@search');


// Misc

Route::get('/regions', 'Api\Misc\RegionController@index');
Route::get('/regions/{region}', 'Api\Misc\RegionController@show');
Route::get('/cities', 'Api\Misc\CityController@index');
Route::get('/jobAdCategories', 'Api\Misc\JobAdCategoryController@index');
Route::get('/productAdCategories', 'Api\Misc\ProductAdCategoryController@index');
Route::get('/degrees', 'Api\Misc\DegreeController@index');
Route::get('/hospitalSpecialities', 'Api\Misc\HospitalSpecialityController@index');
Route::get('/clinicSpecialities', 'Api\Misc\ClinicSpecialityController@index');
Route::get('/cosmeticClinicSpecialities', 'Api\Misc\CosmeticClinicSpecialityController@index');
Route::get('/jobEducationLevels', 'Api\Misc\JobEducationLevelController@index');
Route::get('/jobEmploymentTypes', 'Api\Misc\JobEmploymentTypeController@index');
Route::get('/jobTypes', 'Api\Misc\JobTypeController@index');
Route::get('/jobExperienceLevels', 'Api\Misc\JobExperienceLevelController@index');

Route::get('/job-filters', 'Api\JobFilterController@index');
Route::get('/job-filters-test', 'Api\JobFilterController@test');

Route::get('/top-clients', 'MainPageController@topClients');
Route::get('/job-list', 'MainPageController@jobList');