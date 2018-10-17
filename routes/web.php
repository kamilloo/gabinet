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

Auth::routes();

Route::group(['prefix' => 'admin'], function(){

    Route::resource('categories', 'CategoryController')->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    Route::resource('services', 'ServiceController')->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);


    Route::get('portfolio/create', 'PortfolioController@create')->name('portfolio.create');
    Route::post('portfolio', 'PortfolioController@store')->name('portfolio.store');
    Route::get('portfolio', 'PortfolioController@index')->name('portfolio.index');
    Route::delete('portfolio/{portfolio}', 'PortfolioController@destroy')->name('portfolio.destroy');

    Route::resource('certificates', 'CertificateController')->names([
        'index' => 'certificates.index',
        'create' => 'certificates.create',
        'store' => 'certificates.store',
        'edit' => 'certificates.edit',
        'update' => 'certificates.update',
        'destroy' => 'certificates.destroy',
    ])->except('show');


    Route::resource('pricing', 'PricingController')->names([
        'index' => 'pricing.index',
        'create' => 'pricing.create',
        'store' => 'pricing.store',
        'edit' => 'pricing.edit',
        'update' => 'pricing.update',
        'destroy' => 'pricing.destroy',
    ]);

    Route::resource('tags', 'TagController')->names([
        'index' => 'tags.index',
        'store' => 'tags.store',
    ]);
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Front'], function (){
    Route::get('portfolio', 'PortfolioController@index')->name('portfolio');
    Route::get('usługi', 'ServiceController@index')->name('services');
    Route::get('onas', 'AboutController@index')->name('about');
    Route::get('cennik', 'PricingController@index')->name('pricing');
    Route::get('kontakt', 'Contact@index')->name('contact');
    Route::post('kontakt', 'Contact@store');
    Route::get('/', 'WelcomeController@index')->name('welcome');
});

