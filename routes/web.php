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

Route::get('password/reset/{token}/{email}','Auth\ResetPasswordController@showResetForm')->name('password.reseter')->middleware(['web', 'guest']);
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');




// Dashboard
Route::get('dashboard', 'NavigationController@dashboard')->middleware(['auth','verified'])->name('dashboard');
Route::get('companies', 'CompanyController@index')->name('companies');
Route::get('ranking', 'CompanyController@ranking')->name('ranking');
Route::get('dashboard/company-profile', 'CompanyController@show')->name('add.company');
Route::post('dashboard/company-profile', 'CompanyController@store')->name('store.company');
Route::get('dashboard/company-profile/edit', 'CompanyController@edit')->name('edit.company');
Route::post('dashboard/company-profile/edit', 'CompanyController@update')->name('update.company');
Route::get('dashboard/company-profile/{companySlug}', 'CompanyController@companyProfile')->name('profile.company');
Route::get('dashboard/go/{companySlug}', 'CompanyController@redirectToWebsite')->name('redirect.company');

// User Route
Route::get('dashboard/user-profile', 'UserController@edit')->name('edit.user');
Route::post('dashboard/user-profile', 'UserController@update')->name('update.user');

// Reviews Route
Route::get('/reviews', 'ReviewController@index')->name('all.reviews');
Route::get('dashboard/review', 'ReviewController@myReviews')->name('reviews');
Route::get('/review/{companySlug}', 'ReviewController@filterReview')->name('reviews.company');
Route::get('dashboard/review/{companySlug}', 'ReviewController@addReview')->name('add.review');
Route::post('dashboard/review/{companySlug}', 'ReviewController@store')->name('store.review');
Route::get('dashboard/review/{reviewId}/verify', 'ReviewController@verifyReview')->name('verify.review');
Route::get('company/{companySlug}/{reviewSlug}', 'ReviewController@show')->name('show.review');

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