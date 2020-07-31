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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function() { //routes for admin
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::post('/admin/updateState/{id}', ['uses' => 'AdminController@updateState']);
});

Route::group(['middleware' => ['auth', 'approvedUser']], function() { //Routes after approval of user
    Route::get('/approved', 'HomeController@approved');
});

Route::group(['middleware' => ['auth', 'unapprovedUser']], function() { //Routes before approval of user
    Route::get('/unapproved', 'HomeController@unapproved');
});