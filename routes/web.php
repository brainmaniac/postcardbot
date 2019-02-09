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

Route::get('/', 'RoutesController@welcome')->name('welcome');

Route::get('/gps', 'RoutesController@gps')->name('gps');

Route::get('/addcoordinates/{coordinate}', 'PostcardController@store');
