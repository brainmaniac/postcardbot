<?php

use GuzzleHttp\Client;

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

Route::get('/addcoordinates/{coordinate}', 'PostcardController@store');

// Sample working coordinates
// http://postcardbot.test/addcoordinates/59.2987601,18.082784

// Sample empty coordinates
// http://postcardbot.test/addcoordinates/78.648401,14.194336