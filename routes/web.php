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


/*----FrontEnd Route----*/
Route::get('/','WelcomeController@index');

Route::get('user/signup','FrontsController@user_signup')->name('user/signup');
Route::get('/user/login','FrontsController@user_login')->name('user/login');

// claim
Route::get('/claim','FrontsController@claim')->name('claim');

/* ADMIN ROUTE */

Route::get('/admin', 'AdminsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('airlines', 'AirlinesController');

Route::resource('airports', 'AirportsController');

// Route::get('/', 'AdminsController@index');

Route::resource('currency', 'CurrencyController');
Route::resource('bank-accounts', 'BankAccountsController');

Route::resource('reminders', 'RemindersController');
