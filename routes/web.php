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

Route::resource('portfolio', 'PortfolioController')->names([
    'index' => 'portfolio.index',
    'create' => 'portfolio.create',
    'store' => 'portfolio.store',
    'edit' => 'portfolio.edit',
    'update' => 'portfolio.update',
    'destroy' => 'portfolio.destroy',
]);