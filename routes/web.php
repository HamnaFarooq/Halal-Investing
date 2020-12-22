<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

// User routes //
// ----------- //
Route::get('/', 'HomeController@index')->name('Welcome');
Route::get('/home', 'HomeController@index')->name('home');
// Card Routes
Route::get('/research_reports', 'HomeController@research_reports')->name('research_reports');
Route::get('/request_report', 'HomeController@request_report')->name('request_report');
Route::get('/portfolio', 'HomeController@portfolio')->name('portfolio');
// Request research routes
Route::get('/my_requests', 'HomeController@my_requests')->name('my_requests')->middleware('verified');
Route::post('/request_research', 'Research_requestsController@store')->name('store_request_research')->middleware('verified');
Route::get('/delete_request_research/{id}', 'Research_requestsController@destroy')->name('destroy_request_research');
// footer Routes
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::get('/desclaimer', 'HomeController@desclaimer')->name('desclaimer');
Route::get('/about_us', 'HomeController@about_us')->name('about_us');


// admin routes //
// ------------ //
Route::get('/admin', 'AdminController@index')->name('admin');
// research routes
Route::post('/research', 'ResearchController@store')->name('store_research');
Route::get('/read_research/{id}', 'ResearchController@show')->name('show_research');
Route::get('/edit_research/{id}', 'ResearchController@edit')->name('edit_research');
Route::get('/delete_research/{id}', 'ResearchController@destroy')->name('delete_research');
Route::post('/update_research/{id}', 'ResearchController@update')->name('update_research');
// portfolio routes
Route::post('/portfolio', 'PortfolioController@store')->name('store_portfolio');
Route::get('/delete_portfolio/{id}', 'PortfolioController@destroy')->name('delete_portfolio');
Route::post('/update_portfolio/{id}', 'PortfolioController@update')->name('update_portfolio');
// image routes
Route::post('/add_image', 'ImagesController@store');
Route::get('/remove_image/{id}', 'ImagesController@destroy');
// research request rouets
// Route::post('/accept_request/{id}', 'AdminController@accept_request');
Route::get('/accept_request/{id}', 'AdminController@accept_request');
Route::post('/reject_request/{id}', 'AdminController@reject_request');
Route::post('/complete_request/{id}', 'AdminController@complete_request');
// faq routes
Route::post('/faq', 'FAQController@store')->name('store_faq');
Route::get('/delete_faq/{id}', 'FAQController@destroy')->name('delete_faq');
Route::post('/update_faq/{id}', 'FAQController@update')->name('update_faq');

// Email routes
Route::get('/registered', 'MailController@registered')->name('sendregisteredemail');
Route::get('/portfoliosubscribed', 'PortfolioController@subscribed')->name('sendsubscribedemailportfolio');
Route::get('/reportssubscribed', 'ResearchController@subscribed')->name('sendsubscribedemailreports');
Route::get('/expiring', 'MailController@notifyexpiring')->name('sendnotifyexpiring');

