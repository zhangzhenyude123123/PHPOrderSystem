<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'FirstPageController@show')->name('firstpage.show');
Route::get('/dashboard','MainPageController@mainpage')->name('mainpage');
Route::delete('/dashborad/{reserveid}','MainPageController@cancelreserve')->name('reserve.cancel');
Route::get('/newreserve','ReserveController@newreserve')->name('newreserve');
Route::post('/newreserve/edit/{user}', 'ReserveController@edit')->name('newreserve.edit');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::get('/checkin','CheckController@show')->name('check.show');
Route::put('/checkin/authcode', 'CheckController@authfun')->name('check.auth');

Auth::routes();

