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

Route::get('/manson', function() {
    return view('test');
});

Route::middleware('language')->group(function () {
    Route::get('/lang/{locale}', 'LanguageController@switchLocale')->name('lang');
    Route::get('/', 'MainPageController@index')->name('main');
    Route::get('/contact', 'MainPageController@contact')->name('contact');


    // Job Ads
    Route::get('/jobs', 'JobAdController@index')->name('jobs');
    Route::get('/jobs/{jobAd}/{slug}', 'JobAdController@show');
    Route::post('/job-ads', 'JobAdController@store');
    Route::get('/job-ads/{jobAd}/edit', 'JobAdController@edit');
    Route::put('/job-ads/{jobAd}/edit', 'JobAdController@update');
    Route::get('/job-ads/{jobAd}/delete', 'JobAdController@destroy');

    // Product Ads
    Route::get('/products', 'ProductAdController@index')->name('products');
    Route::get('/products/{productAd}/{slug}', 'ProductAdController@show');
    Route::post('/product-ads', 'ProductAdController@store');
    Route::get('/product-ads/{productAd}/edit', 'ProductAdController@edit');
    Route::put('/product-ads/{productAd}/edit', 'ProductAdController@update');
    Route::get('/product-ads/{productAd}/delete', 'ProductAdController@destroy');

    // Hospitals
    Route::get('/hospitals', 'HospitalController@index')->name('hospitals');
    Route::get('/hospitals/{hospital}/{slug}', 'HospitalController@show');
    Route::get('/admin/hospitals/list', 'HospitalController@list')->name('listHospital');
    Route::get('/admin/hospitals/new', 'HospitalController@create')->name('newHospital');
    Route::post('/admin/hospitals/new', 'HospitalController@store')->name('storeHospital');

    // Clinics
    Route::get('/clinics', 'ClinicController@index')->name('clinics');
    Route::get('/clinics/{clinic}/{slug}', 'ClinicController@show');
    Route::get('/admin/clinic/list', 'ClinicController@list')->name('listClinic');
    Route::get('/admin/clinics/new', 'ClinicController@create')->name('newClinic');
    Route::post('/admin/clinics/new', 'ClinicController@store')->name('storeClinic');


    // Cosmetic Clinics
    Route::get('/cosmetic-clinics', 'CosmeticClinicController@index')->name('cosmetics');
    Route::get('/cosmetic-clinics/{cosmeticClinic}/{slug}', 'CosmeticClinicController@show');
    Route::get('/admin/cosmetic/list', 'CosmeticClinicController@list')->name('listCosmeticClinic');
    Route::get('/admin/cosmetic-clinics/new', 'CosmeticClinicController@create')->name('newCosmeticClinic');
    Route::post('/admin/cosmetic-clinics/new', 'CosmeticClinicController@store')->name('storeCosmeticClinic');


    // Pharmacies
    Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies');
    Route::get('/pharmacies/{pharmacy}/{slug}', 'PharmacyController@show');
    Route::get('/admin/pharmacies/list', 'PharmacyController@list')->name('listPharmacy');
    Route::get('/admin/pharmacies/new', 'PharmacyController@create')->name('newPharmacy');
    Route::post('/admin/pharmacies/new', 'PharmacyController@store')->name('storePharmacy');




    // Users
    Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::put('/users', 'UserController@update')->name('updateUser');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/favorites/hospitals', 'HomeController@favoriteHospitals')->name('favoriteHospitals');
    Route::get('/home/favorites/clinics', 'HomeController@favoriteClinics')->name('favoriteClinics');
    Route::get('/home/favorites/pharmacies', 'HomeController@favoritePharmacies')->name('favoritePharmacies');
    Route::get('/home/favorites/cosmetic-clinics', 'HomeController@favoriteCosmeticClinics')->name('favoriteCosmeticClinics');
    Route::get('/home/favorites/products', 'HomeController@favoriteProducts')->name('favoriteProducts');
    Route::get('/home/favorites/jobs', 'HomeController@favoriteJobs')->name('favoriteJobs');
    Route::get('/home/jobs', 'HomeController@jobList')->name('jobList');
    Route::get('/home/new/job', 'HomeController@createJob')->name('createJob');
    Route::get('/home/products', 'HomeController@productList')->name('productList');
    Route::get('/home/new/product', 'HomeController@createProduct')->name('createProduct');


    Auth::routes();
    Route::get('/comingsoon', function () {
        return view('comingsoon');
    });






// admin Login
    Route::prefix('admin')->group(function () {
        Route::get('/', function () { return redirect()->route('admin.dashboard'); });
        Route::get('/home', 'AdminController@index')->name('admin.dashboard');
        Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
        Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
        Route::view('/apiToken', 'dev.apiTokens')->name('create-token');

        Route::POST('password/email',           'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::POST('password/reset',           'Auth\AdminResetPasswordController@reset');
        Route::GET('password/reset',            'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::GET('password/reset/{token}',    'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

        Route::get('/users/info', 'AdminUserController@index')->name('admin.user.info');
        //Route::post('/users/info', 'AdminUserController@index')->name('admin.user.info'); Replaced by API POST
        Route::get('/users/create', 'AdminUserController@show')->name('admin.user.create');
        //Route::post('/users/create', 'AdminUserController@store'); Replaced by API POST
        Route::get('/users/edit/{ref_id}', 'AdminUserController@edit')->name('admin.user.edit');
        //Route::put('/users/update/{user}', 'AdminUserController@update')->name('admin.user.update'); [HOLD ON USAGE]
        Route::delete('/users/delete/{ref_id}', 'AdminUserController@destroy')->name('admin.user.delete');
    });
});