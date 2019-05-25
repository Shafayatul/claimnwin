<?php


// use Illuminate\Support\Facades\Route;

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


Route::get('/test_forword', 'TestsController@test_forword');

/* ----- Access by all - not logged ----- */

// FrontEnd Route
Route::get('/','WelcomeController@index');

// Ajax - calculation
Route::post('/ajax/calculate/missed_calculation','ClaimsController@ajax_missed_calculation');
Route::post('/ajax/calculate/fight_delay_calculation','ClaimsController@ajax_fight_delay_calculation');
Route::post('/ajax/calculate/fight_cancellation_calculation','ClaimsController@ajax_fight_cancellation_calculation');
Route::post('/ajax/calculate/lost_luggage_calculation','ClaimsController@ajax_lost_luggage_calculation');
Route::post('/ajax/calculate/denied_bording_calculation','ClaimsController@ajax_denied_bording_calculation');
Route::post('/ajax/calculate/delay_luggage_calculation','ClaimsController@ajax_delay_luggage_calculation');

Route::post('/ajax/currency_converter_url','ClaimsController@currency_converter_url');

// Front Pages Starts
Route::get('/about-us','FrontsController@aboutUs');
Route::get('/contact-us','FrontsController@contactUs');
Route::get('/faq','FrontsController@faq');
Route::get('/terms-and-conditions','FrontsController@termsAndConditions');
Route::get('/privacy-policy','FrontsController@privacyPolicy');
Route::get('/pricing-list','FrontsController@pricingList');
Route::get('/press-blog','FrontsController@pressBlog');
Route::get('/single-blog/{title}/{id}','FrontsController@singleBlogView');
Route::get('/app','FrontsController@app');
Route::get('/partner','FrontsController@partner');
Route::get('/affiliate-page','FrontsController@affiliatePage');
Route::get('/form-claim','FrontsController@formClaim');
// auth
Auth::routes();
// claim
Route::post('/claim','ClaimsController@store');
Route::get('/claim','ClaimsController@claim')->name('claim');
Route::get('/missed-connection','ClaimsController@missed_connection')->name('missed-connection');
Route::get('/flight-delay','ClaimsController@flight_delay')->name('flight-delay');
Route::get('/flight-cancellation','ClaimsController@flight_cancellation')->name('flight-cancellation');
Route::get('/delay-luggage','ClaimsController@delay_luggage')->name('delay-luggage');
Route::get('/lost-luggage','ClaimsController@lost_luggage')->name('lost-luggage');
Route::get('/denied-boarding','ClaimsController@denied_boarding')->name('denied-boarding');
// signup and login
Route::post('/user/signup','UserPanelController@userSignup');
Route::get('/user/signup/{encrypt_user_id?}','UserPanelController@user_signup')->name('user/signup');
Route::get('/user/login','UserPanelController@user_login')->name('user/login');


/* ----- Only Logged User ----- */
Route::group(['middleware' => ['auth']], function() {


    Route::group(['middleware' => ['role:User']], function () {
        Route::get('/user-home','UserPanelController@index');
        Route::get('/user-my-claim/{id}','UserPanelController@user_my_claim');
        Route::get('/affiliate','UserPanelController@affiliate');
        Route::post('/user-ticket-message','UserPanelController@user_ticket_message')->name('user-ticket-message');
        Route::post('/user-upload-file','UserPanelController@claimFileUpload');
        Route::get('/user-download-file/{id}','UserPanelController@claimFileDownload');
        Route::get('/affiliate-info','UserPanelController@affiliateInfoShow');

        Route::get('/refferal-all/{id}','UserPanelController@allRefferalDataView');
        Route::get('/refferal-all-export','UserPanelController@exportRefferalData');

        Route::get('/pending-payment/{id}','UserPanelController@allPendingPaymentDataView');
        Route::get('/pending-payment-all-export','UserPanelController@exportPendingPaymentData');

        Route::get('/payment/{id}','UserPanelController@allPaymentDataView');
        Route::get('/payment-all-export','UserPanelController@exportPaymentData');
    });

    // Admin + SUper Admin
    Route::group(['middleware' => ['role:Admin|Super Admin']], function () {
        Route::resource('email-templates', 'EmailTemplatesController');
        Route::post('ajax/get-email-template', 'EmailTemplatesController@get_email_template');
        Route::get('/activity/index', 'ActivityController@index');
        Route::get('/admin', 'AdminsController@index');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('airlines', 'AirlinesController');
        Route::resource('airports', 'AirportsController');
        Route::resource('currency', 'CurrencyController');
        Route::resource('bank-accounts', 'BankAccountsController');
        Route::resource('reminders', 'RemindersController');
        Route::post('/reminder-create', 'RemindersController@store')->name('reminder-create');
        Route::post('/update-reminder', 'RemindersController@update')->name('update-reminder');
        Route::delete('/reminders-delete/{id}','RemindersController@destroy');
        Route::get('/reminder-status-dismiss/{id}', 'RemindersController@reminderStatusDismiss');
        Route::get('/reminder-status-markasdone/{id}', 'RemindersController@reminderStatusMarkasdone');
        Route::get('socialauth/{provider}','SocialAuthController@redirectToProvider');
        Route::get('socialauth/{provider}/callback','SocialAuthController@handleProviderCallback');

        Route::post('/update-password', 'UsersController@update_password');
        Route::get('/update-password', 'UsersController@show_update_password');
        Route::get('/admin-user',  'AdminsController@create');
        Route::post('/admin-user',  'AdminsController@store');
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
        Route::get('/manage-report', 'ClaimBackController@index_report');
        Route::get('/manage-affiliate', 'ClaimBackController@index_affiliate');
        Route::get('/manage-claim/user/{id}', 'ClaimBackController@index_by_user');
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
        Route::get('/claim-archive/{id}', 'ClaimBackController@claimArchiveOrReopen');
        Route::resource('notes', 'NotesController');
        Route::post('/save-note', 'NotesController@store')->name('save-note');
        Route::post('/update-note', 'NotesController@update')->name('update-note');
        Route::post('/tickets/reopen/{id}', 'TicketsController@reopenTicket');
        Route::resource('tickets', 'TicketsController');
        Route::resource('ticket-notes', 'TicketNotesController');
        Route::post('/ticket-description', 'TicketNotesController@ticketDescriptionSave')->name('ticket-description');
        Route::get('/close-ticket/{id}', 'TicketsController@closeTicket');
        Route::post('/ticket-assign-user', 'TicketsController@ticketAssignUser')->name('ticket.user.assign');
        Route::post('/ajax/ticket/assign', 'TicketsController@ajax_ticket_assign');
        Route::post('/ajax/ticket/priority', 'TicketsController@ajax_ticket_priority');
        Route::post('/ajax/ticket/ticket_status', 'TicketsController@ajax_ticket_ticket_status');

        Route::get('/my-tickets','TicketsController@myTickets');
        Route::get('/tickets-inbox', 'TicketsController@ticketInbox');
        Route::get('/ticket-single-email/{id}','TicketsController@ticketSingleEmailView');
        // Route::get('/contact-messages','TicketsController@contactMessages');
        Route::resource('flights', 'FlightsController');
        Route::get('/letter-before-action/{id}', 'PdfController@letterBeforeActionView');
        Route::get('/poa-pdf/{id}', 'PdfController@pdfView');

        // Route::resource('claim-files', 'ClaimFilesController');
        Route::get('/archive-manage-claim', 'ClaimBackController@archiveIndex');
        Route::post('/letter-before-email', 'PdfController@letterBeforeActionEmail')->name('letter.before.email');

        // Post
        Route::get('/admin/posts/create/{type}', 'PostsController@create_with_type');
        Route::get('/admin/posts/{type}', 'PostsController@index_with_type');
        Route::resource('posts', 'PostsController');
        Route::post('/affiliate-note-add','ClaimBackController@affiliateNoteAdd')->name('affiliate-note-add');
        Route::post('/update-affiliate-note', 'ClaimBackController@affiliateNoteUpdate')->name('update-affiliate-note');
        Route::delete('/affiliate-notes/{id}', 'ClaimBackController@affiliateNoteDelete');

        Route::post('/compose-customer-data', 'ClaimBackController@customerComposeDataSave')->name('compose-customer-data');
        Route::post('/airline-compose-data', 'ClaimBackController@airlineComposeDataSave')->name('airline-compose-data');

        Route::post('/departure-arival-time-save', 'ClaimBackController@departureArivalTimeSave')->name('departure-arival-time-save');

        Route::post('/airline-reply-data', 'ClaimBackController@airlineReplyDataSave')->name('airline-reply-data');
        Route::post('/reply-customer-data', 'ClaimBackController@customerReplyDataSave')->name('reply-customer-data');
        Route::get('/ticket-reply-view/{id}', 'TicketsController@ticketReplyView');
        Route::post('/ticket-reply-data', 'TicketsController@ticketReplyDataSave')->name('ticket-reply-data');

        Route::post('/update-affilite-info-data', 'ClaimBackController@updateAffiliteInfoData')->name('update-affilite-info-data');

        Route::get('/affiliates', 'AffiliatesController@manageAffiliate');
        Route::delete('/affiliate/{id}', 'AffiliatesController@destroy');
        Route::get('/affliate/{id}/edit', 'AffiliatesController@edit');
        Route::get('/affliate/{id}', 'AffiliatesController@show');
        Route::patch('affliate/{id}', 'AffiliatesController@update');
        Route::get('/export-affliate-all', 'AffiliatesController@exportAffiliate');

    });
});




Route::resource('sent-emails', 'SentEmailsController');

Route::get('404', ['as' => '404', 'uses' => 'ErrorController@notfound404']);
Route::get('404', ['as' => '403', 'uses' => 'ErrorController@notfound403']);
Route::post('/contacts/create','ContactsController@store');
Route::get('/contact-messages','ContactsController@index');
Route::get('/contact-show','ContactsController@index@show');

Route::resource('contacts', 'ContactsController');