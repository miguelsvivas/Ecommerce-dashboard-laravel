<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ContentController@getHome');

Route::get('/login','ConnectController@getLogin')->name('login');
Route::post('/login','ConnectController@postLogin')->name('login');

Route::get('/recover','ConnectController@getRecover')->name('recover');

Route::post('/recover','ConnectController@postRecover')->name('recover');

Route::get('/reset','ConnectController@getReset')->name('reset');

Route::post('/reset','ConnectController@postReset')->name('reset');

Route::get('/register','ConnectController@getRegister')->name('register');

Route::post('/register','ConnectController@postRegister')->name('register');

Route::get('/logout','ConnectController@getLogout')->name('logout');

//module User Actions

Route::get('/account/edit', 'UserController@getAccountEdit')->name('account_edit');

Route::post('/account/edit/info','UserController@postAccountInfo')->name('account_info_edit');





