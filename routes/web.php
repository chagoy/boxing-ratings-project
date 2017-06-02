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

//API STUFF
Route::post('/api/card', 'CardsController@store');
Route::get('/api/card', 'CardsController@index');
Route::get('/api/cards/{network}/{date}', 'CardsController@show');

Route::get('/api/boxers', 'BoxersController@index');
Route::post('/api/boxers', 'BoxersController@store');
Route::get('/api/boxers/{boxer}', 'BoxersController@show');

Route::get('/api/networks', 'NetworksController@index');
Route::post('/api/networks', 'NetworksController@store');
Route::get('/api/networks/{network}', 'NetworksController@show');

Route::get('/api/promoters', 'PromotersController@index');
Route::get('/api/promoters/{promoter}', 'PromotersController@show');
Route::post('/api/promoters', 'PromotersController@store');

Route::get('/api/locations', 'LocationsController@index');
Route::post('/api/locations', 'LocationsController@store');
Route::get('/api/venue/{venue}', 'LocationsController@show');
