<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('Welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Card Routes
Route::get('/research_reports', 'HomeController@research_reports')->name('research_reports');
Route::get('/request_report', 'HomeController@request_report')->name('request_report');
Route::get('/portfolio', 'HomeController@portfolio')->name('portfolio');

// footer Routes
Route::get('/contact_us', 'HomeController@contact_us')->name('contact_us');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/desclaimer', 'HomeController@desclaimer')->name('desclaimer');
Route::get('/about_us', 'HomeController@about_us')->name('about_us');

// admin routes
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
// Image routes
Route::post('/add_image', 'ImagesController@store');
Route::get('/remove_image/{id}', 'ImagesController@destroy');
