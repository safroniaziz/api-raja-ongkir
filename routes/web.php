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
    return view('home');
})->name('home');

Route::get('page/get_provinces','PageController@getProvince')->name('get_province');
Route::get('/page/provinces_list','PageController@p_list')->name('p_list');
Route::get('/page/cities_list','PageController@c_list')->name('c_list');
Route::get('page/get_cities','PageController@getCity')->name('get_city');
Route::get('page/check_shipping','PageController@checkShipping')->name('check_shipping');
Route::post('page/process_shipping','PageController@processShipping')->name('process_shipping');