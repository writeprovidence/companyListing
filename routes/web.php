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
Route::get('dashboard/company-profile', 'CompanyController@edit')->name('add.company');
Route::post('dashboard/company-profile', 'CompanyController@store')->name('store.company');
Route::get('dashboard/company-profile/edit', 'CompanyController@show')->name('edit.company');
Route::post('dashboard/company-profile/edit', 'CompanyController@update')->name('update.company');

// User Route
Route::get('dashboard/user-profile', 'UserController@edit')->name('edit.user');
Route::post('dashboard/user-profile', 'UserController@update')->name('update.user');
