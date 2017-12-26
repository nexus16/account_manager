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
