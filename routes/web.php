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


Route::middleware('language')->group(function () {
    Route::get('/lang/{locale}', 'LanguageController@switch')->name('lang');
    Route::get('/', 'MainPageController@index')->name('main');
    Route::get('/contact', 'MainPageController@contact')->name('contact');


    // Job Ads
    Route::get('/jobs', 'JobAdController@index')->name('jobs');
    Route::get('/jobs/{jobAd}/{slug}', 'JobAdController@show');

    // ProductAds
    Route::get('/products', 'ProductAdController@index')->name('products');
    Route::get('/products/{productAd}/{slug}', 'ProductAdController@show');
    Route::post('/product-ads', 'ProductAdController@store');

    // Hospitals
    Route::get('/hospitals', 'HospitalController@index')->name('hospitals');
    Route::get('/hospitals/{hospital}/{slug}', 'HospitalController@show');

    // Clinics
    Route::get('/clinics', 'ClinicController@index')->name('clinics');
    Route::get('/clinics/{clinic}/{slug}', 'ClinicController@show');

    // Cosmetic Clinics
    Route::get('/cosmetic-clinics', 'CosmeticClinicController@index')->name('cosmetics');
    Route::get('/cosmetic-clinics/{cosmeticClinic}/{slug}', 'CosmeticClinicController@show');

    // Pharmacies
    Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies');
    Route::get('/pharmacies/{pharmacy}/{slug}', 'PharmacyController@show');





    Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/favorites/hospitals', 'HomeController@favoriteHospitals')->name('favoriteHospitals');
    Route::get('/favorites/clinics', 'HomeController@favoriteClinics')->name('favoriteClinics');
    Route::get('/favorites/pharmacies', 'HomeController@favoritePharmacies')->name('favoritePharmacies');
    Route::get('/favorites/cosmetic-clinics', 'HomeController@favoriteCosmeticClinics')->name('favoriteCosmeticClinics');
    Route::get('/favorites/products', 'HomeController@favoriteProducts')->name('favoriteProducts');
    Route::get('/favorites/jobs', 'HomeController@favoriteJobs')->name('favoriteJobs');

    Route::get('/new/product', 'HomeController@createProduct')->name('createProduct');

    Auth::routes();
    Route::get('/comingsoon', function () {
        return view('comingsoon');
    });






// Admin Login
    Route::prefix('admin')->group(function () {
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::view('/apiToken', 'dev.apiTokens')->name('create-token');

        Route::POST('password/email',           'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::POST('password/reset',           'Auth\AdminResetPasswordController@reset');
        Route::GET('password/reset',            'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::GET('password/reset/{token}',    'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    });
});