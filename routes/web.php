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

Route::get('/user-home','UserPanelController@index');



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

Route::get('socialauth/{provider}','SocialAuthController@redirectToProvider');
Route::get('socialauth/{provider}/callback','SocialAuthController@handleProviderCallback');

Route::post('user/signup','UserPanelController@userSignup')->name('user/signup');

Route::post('/admin/assignRole',  'RoleController@assignRole');
Route::get('/admin/datatable/role_assign', 'RoleController@datatable_user_role');
Route::get('/admin/role/assign',  'RoleController@assign')->name('role.assign');
Route::resource('/admin/role',  'RoleController');

Route::get('/user-info/{id}', 'UserManageController@editUserinfo');
Route::post('/update-user-info', 'UserManageController@updateUserInfo')->name('update-user-info');
Route::delete('/user-delete/{id}', 'UserManageController@destroy');

