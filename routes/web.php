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

Route::get('/', 'MainController@root')->name('root');
Route::get('/dashboard','MainPageController@mainpage')->name('mainpage');
Route::get('/newreserve','ReserveController@newreserve')->name('newreserve');
Route::post('/newreserve/edit/{user}', 'ReserveController@edit')->name('newreserve.edit');

Route::get('/users/{user}', 'UsersController@show')->name('users.show');


Auth::routes();

