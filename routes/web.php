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


/*----FrontEnd Route----*/
Route::get('/','WelcomeController@index');

Route::get('user/signup','UserPanelController@user_signup')->name('user/signup');
Route::get('/user/login','UserPanelController@user_login')->name('user/login');

Route::get('/user-home','UserPanelController@index');
Route::get('/user-my-claim/{id}','UserPanelController@user_my_claim');


// claim
Route::post('/claim','ClaimsController@store');
Route::get('/claim','ClaimsController@claim')->name('claim');
Route::get('/missed-connection','ClaimsController@missed_connection')->name('missed-connection');

Route::get('/flight-delay','ClaimsController@flight_delay')->name('flight-delay');
Route::get('/flight-cancellation','ClaimsController@flight_cancellation')->name('flight-cancellation');
Route::get('/delay-luggage','ClaimsController@delay_luggage')->name('delay-luggage');
Route::get('/lost-luggage','ClaimsController@lost_luggage')->name('lost-luggage');
Route::get('/denied-boarding','ClaimsController@denied_boarding')->name('denied-boarding');

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
Route::post('/reminder-create', 'RemindersController@store')->name('reminder-create');
Route::post('/update-reminder', 'RemindersController@update')->name('update-reminder');
Route::delete('/reminders-delete/{id}','RemindersController@destroy');

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


Route::resource('connections', 'ConnectionsController');
Route::resource('itinerary-details', 'ItineraryDetailsController');
Route::resource('expenses', 'ExpensesController');
Route::resource('passengers', 'PassengersController');
Route::resource('claims', 'ClaimsController');
Route::resource('claim-status', 'ClaimStatusController');
Route::resource('next-step', 'NextStepController');
Route::resource('settings', 'SettingsController');

Route::get('/manage-claim', 'ClaimBackController@index');

Route::get('/claim-view/{id}', 'ClaimBackController@claimView');
Route::get('/manage-unfinished-claim', 'ClaimBackController@manageUnfinishedClaim');
Route::get('/unfinished-claim-view', 'ClaimBackController@unfinishedClaimView');
Route::get('/manage-fills-claim', 'ClaimBackController@manageFillsClaim');
Route::get('/fills-claim-view', 'ClaimBackController@fillsClaimView');
Route::post('/claim-file-upload', 'ClaimBackController@claimFileUpload')->name('claim-file-upload');
Route::post('/claim-nextstep-status-change', 'ClaimBackController@claimNextstepStatusChange')->name('claim-nextstep-status-change');
Route::post('/required-details', 'ClaimBackController@requiredDetailsUpdate')->name('required-details');
Route::get('/claim-file/{id}', 'ClaimBackController@downloadClaimFile');
Route::get('/claim-archive/{id}', 'ClaimBackController@claimArchive');

Route::resource('notes', 'NotesController');
Route::post('/save-note', 'NotesController@store')->name('save-note');

Route::resource('tickets', 'TicketsController');
Route::resource('ticket-notes', 'TicketNotesController');
Route::post('/ticket-description', 'TicketNotesController@ticketDescriptionSave')->name('ticket-description');
Route::get('/close-ticket/{id}', 'TicketsController@closeTicket');

Route::resource('flights', 'FlightsController');

Route::get('/letter-before-action/{id}', 'PdfController@letterBeforeActionView');
Route::get('/poa-pdf/{id}', 'PdfController@pdfView');

Route::resource('claim-files', 'ClaimFilesController');



Route::get('/test', 'TestsController@test');
