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
Route::post('/', 'MeetingsController@store')->name('meeting.store');
Route::get('/meeting', 'MeetingsController@wait')->name('meeting.wait');
Route::get('/meeting/confirm', 'UsersController@confirm')->name('user.confirm');
Route::get('/meeting/start', 'UsersController@start')->name('user.start');
Route::get('/meeting/{id}', 'UsersController@create')->name('user.create');
Route::post('/meeting/{id}', 'UsersController@store')->name('user.store');
