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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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