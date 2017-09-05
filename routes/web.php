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

Route::get('index', 'PagesController@getWebsite');
Route::get('admin', 'PagesController@getAdmin');
Route::get('employee', 'PagesController@getEmployee');
Route::get('terminal', 'PagesController@getTerminal');
Route::get('device', 'PagesController@getDevice');


Route::get('site_available', 'PagesController@getSites');
Route::get('emp_available', 'PagesController@getAvailabel_emp');
Route::get('device_available', 'PagesController@getAvailable_device');

Route::get('city_registration', 'PagesController@getCity_registration');
Route::get('site_registration', 'PagesController@getSite_registration');

Route::get('location_registration', 'PagesController@getLocation_registration');
