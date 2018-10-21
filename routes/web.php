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

Route::get('/waiting', function () {
    return view('users.waiting');
});

Route::post('/', 'MeetingsController@store')->name('meeting.store');


Route::get('/assign/{id}', 'UsersController@create')->name('user.create');
Route::post('/assign/{id}', 'UsersController@store')->name('user.store');
