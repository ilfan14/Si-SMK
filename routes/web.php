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
    return view('auth.login');
});

Auth::routes();

Route::group(array('prefix' => 'home'), function () {
	Route::get('/', array('as' => 'dashboard','uses' => 'HomeController@index'));

	Route::group(array('prefix' => 'users'), function () {
        Route::get('/', array('as' => 'users', 'uses' => 'UserController@index'));
        Route::post('gantigambar', array('as' => 'gantigambar', 'uses' => 'UserController@changeimage'));
        Route::post('passwordreset', 'UserController@passwordreset');
        Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UserController@show'));

    });
});






