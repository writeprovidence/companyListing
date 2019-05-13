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


Route::get('d', function(){
    return var_dump(Auth::user()->hasCompany());
});
