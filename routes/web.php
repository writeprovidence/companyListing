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

Route::get('/', 'NavigationController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('password/reset/{token}/{email}','Auth\ResetPasswordController@showResetForm')->name('password.reseter')->middleware(['web', 'guest']);
Auth::routes(['verify' => true]);
// Dashboard
Route::get('dashboard', 'NavigationController@dashboard')->middleware(['auth','verified'])->name('dashboard');
Route::get('companies', 'CompanyController@index')->name('companies');
Route::post('companies', 'CompanyController@orderBy')->name('order.companies');
Route::get('rankings', 'CompanyController@ranking')->name('ranking');
Route::post('rankings', 'CompanyController@orderRankingBy')->name('order.ranking');
Route::get('dashboard/company-profile', 'CompanyController@show')->name('add.company');
Route::post('dashboard/company-profile', 'CompanyController@store')->name('store.company');
Route::get('dashboard/company-profile/edit', 'CompanyController@edit')->name('edit.company');
Route::post('dashboard/company-profile/edit', 'CompanyController@update')->name('update.company');
Route::get('company-profile/{companySlug}', 'CompanyController@companyProfile')->name('profile.company');
Route::post('company-profile/{companySlug}', 'CompanyController@orderCompanyProfileBy')->name('order.profile.company');
Route::get('dashboard/go/{companySlug}', 'CompanyController@redirectToWebsite')->name('redirect.company');
Route::get('dashboard/review', 'ReviewController@myReviews')->name('reviews');

// User Route
Route::get('dashboard/user-profile', 'UserController@edit')->name('edit.user');
Route::post('dashboard/user-profile', 'UserController@update')->name('update.user');

// Reviews Route
Route::get('/reviews', 'ReviewController@index')->name('all.reviews');
Route::post('/reviews', 'ReviewController@orderBy')->name('order.reviews');
Route::get('/review/{companySlug}', 'ReviewController@filterReview')->name('reviews.company');
Route::post('/review/{companySlug}', 'ReviewController@orderFilterReviewBy')->name('filter.reviews.company');
Route::get('dashboard/review/{companySlug}', 'ReviewController@addReview')->name('add.review');
Route::post('dashboard/review/{companySlug}', 'ReviewController@store')->name('store.review');
Route::get('dashboard/review/{reviewId}/verify', 'ReviewController@verifyReview')->name('verify.review');
Route::get('company/{companySlug}/{reviewSlug}', 'ReviewController@show')->name('show.review');
Route::post('dashboard/review/{reviewSlug}/response', 'ReviewController@storeResponse')->name('store.reviewresponse');

// Upvote and down vote API
Route::get('dashboard/review/{companySlug}/upvote', 'ReviewController@upvote');
Route::get('dashboard/review/{companySlug}/downvote', 'ReviewController@downvote');

// Search
Route::get('search', 'SearchController@search')->name('search');

//News Letter Subscription
Route::post('newsletter/subscribe', 'MailSubscriptionController@subscribe')->name('subscribe.newsletter');

// Admin Routes
Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::get('admin/dashboard/resetpassword', 'AdminController@showResetForm')->name('admin.password.reset');
Route::post('admin/dashboard/resetpassword', 'AdminController@resetPassword')->name('admin.resetpassword');
Route::get('admin/dashboard/users', 'AdminController@users')->name('admin.users');
Route::post('admin/dashboard/users', 'AdminController@orderUsers')->name('admin.user.order');
// Admin Company routes
Route::get('admin/dashboard/companies', 'AdminController@companies')->name('admin.companies');
Route::post('admin/dashboard/companies', 'AdminController@orderCompanies')->name('admin.companies.order');
Route::get('companies/{companySlug}/approve', 'AdminController@approveCompany')->name('approve.company');
Route::get('companies/{companySlug}/reject', 'AdminController@rejectCompany')->name('reject.company');
Route::get('companies/{companySlug}/edit', 'AdminController@editCompany')->name('admin.editcompany');
Route::post('companies/{companySlug}/edit', 'AdminController@updateCompany')->name('admin.updatecompany');
// Admin review routes
Route::get('admin/dashboard/reviews', 'AdminController@reviews')->name('admin.reviews');
Route::post('admin/dashboard/reviews', 'AdminController@orderReviews')->name('admin.reviews.order');
Route::get('admin/reviews/{reviewSlug}/approve', 'AdminController@approveReview')->name('approve.review');
Route::get('admin/reviews/{reviewSlug}/reject', 'AdminController@rejectReview')->name('reject.review');
Route::get('admin/reviews/{reviewSlug}/edit', 'AdminController@editReview')->name('admin.editreview');
Route::post('admin/reviews/{reviewSlug}/edit', 'AdminController@updateReview')->name('admin.updatereview');

// Logs route
Route::get('admin/dashboard/loginlogs', 'AdminController@loginLogs')->name('admin.loginlogs');

// Country Routes
Route::get('companies/country/{country}', 'CompanyController@country')->name('contry.company');
Route::post('companies/country/{country}', 'CompanyController@orderCountryBy')->name('order.country');
