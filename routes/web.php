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

use App\Helpers\Helper;

Route::get('/', 'AdsController@getCommonAds');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('ads', 'AdsController');

Route::get('myAds', 'AdsController@getUserAds');

Route::get('{id}/{slug}', 'AdsController@getByCategory');

Route::get('ads/{id}/{slug}', 'AdsController@show');

Route::post('search', 'AdsController@search');

Route::post('ad/{id}/favorite', 'favoriteController@store');

Route::post('ad/{id}/unfavorite', 'favoriteController@destroy');

Route::get('myFav', 'favoriteController@index');

Route::resource('comment', 'CommentController')->only('store')->middleware('auth');

Route::post('comment/replay', 'CommentController@replay')->name('comment.replay');
