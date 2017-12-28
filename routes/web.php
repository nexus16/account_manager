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

Route::get('/demo2', function () {
    return view('welcome');
});
Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
	Route::get('/account/', 'AccountsController@index');
	Route::get('/account/{id}', 'AccountsController@show');
	Route::post('/account/', 'AccountsController@save');
	Route::post('/account/{id}', 'AccountsController@update');
	Route::delete('/account/{id}', 'AccountsController@destroy');
});
	Route::get('/demo/', 'DemoController@index');
