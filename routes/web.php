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

Route::group(['middleware' => 'auth'], function () {
    Route::get('user-info', 'UserController@getUserInfo');
	Route::get('/account/', 'AccountsController@index')->name('accounts.index');
	Route::get('/account/{id}', 'AccountsController@show');
	Route::get('/account/{id}/edit', 'AccountsController@edit')->name('accounts.edit');
	Route::post('/account/', 'AccountsController@save')->name('accounts.save');;
	Route::post('/account/{id}', 'AccountsController@update')->name('accounts.update');
	Route::delete('/account/{id}', 'AccountsController@destroy')->name('accounts.delete');
	Route::get('/', 'AccountsController@index')->name('home');
});

Auth::routes();

