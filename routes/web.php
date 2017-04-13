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

Route::get('/auth/callback', 'AuthController@handleProviderCallback');
Route::get('/auth', 'AuthController@redirectToProvider');
Route::get('/auth/check', 'AuthController@checkAuth');

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*')->name('spa');
