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
    Route::get('/', function () {
        $h = \App\Hospital::with(['rates', 'user'])->inRandomOrder()->get()->take(3);

        $p = \App\Pharmacy::with(['rates', 'user'])->inRandomOrder()->get()->take(3);

        $c = \App\Clinic::with(['rates', 'user'])->inRandomOrder()->get()->take(3);

        $hospitals = json_encode(new \App\Http\Resources\HospitalCollection($h));
        $pharmacies = json_encode(new \App\Http\Resources\PharmacyCollection($p));
        $clinics = json_encode(new \App\Http\Resources\ClinicCollection($c));

        return view('landing', compact(['hospitals', 'pharmacies', 'clinics']));
    });


    Route::get('/comingsoon', function () {
        return view('comingsoon');
    });

    Route::get('/job-ads', 'JobAdController@index');






    Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

    Route::get('/home', 'HomeController@index')->name('home');

    Auth::routes();




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