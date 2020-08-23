<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('home');
    
    Route::get('/currencies', 'CurrencyController@index')->name('allCurrencies');
    
    Route::get('/currencies/create', 'CurrencyController@create');
    Route::post('/currencies', 'CurrencyController@store');
    
    Route::get('currencies/{currency:id}/edit', 'CurrencyController@edit');
    Route::patch('/currencies/{currency:id}', 'CurrencyController@update');
    
    Route::delete('currencies/{currency:id}/delete', 'CurrencyController@destroy');

    Route::get('/accounts', 'AccountController@index');

    Route::get('/accounts/create', 'AccountController@create');
    Route::post('/accounts', 'AccountController@store');

    Route::get('accounts/{account:id}/edit', 'AccountController@edit');
    Route::patch('/accounts/{account:id}', 'AccountController@update');
    
    Route::delete('accounts/{account:id}/delete', 'AccountController@destroy');

    Route::get('/categories', 'CategoriesController@index');

    Route::get('/categories/create', 'CategoriesController@create');
    Route::post('/categories', 'CategoriesController@store');

    Route::get('categories/{category:id}/edit', 'CategoriesController@edit');
    Route::patch('/categories/{category:id}', 'CategoriesController@update');
    
    Route::delete('categories/{category:id}/delete', 'CategoriesController@destroy');
});

Auth::routes();
 
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
