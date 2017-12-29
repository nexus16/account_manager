<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/register', 'Api\UserController@register');
Route::post('auth/login', 'Api\UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user-info', 'Api\UserController@getUserInfo');
	Route::get('/account/', 'Api\AccountsController@index');
	Route::get('/account/{id}', 'Api\AccountsController@show');
	Route::post('/account/', 'Api\AccountsController@save');
	Route::post('/account/{id}', 'Api\AccountsController@update');
	Route::delete('/account/{id}', 'Api\AccountsController@destroy');
});
