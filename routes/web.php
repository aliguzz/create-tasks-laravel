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

Route::group(array('before' => 'auth'), function () {

    Route::get('/dashboard',array('uses' => 'DashboardController@index'));
    Route::get('/logout', 'DashboardController@logout');
    Route::resource('/tasks','TasksController');
   
});

Route::get('/', function () {
    return view('welcome');
});


    Route::get('/register','Auth\RegisterController@index');
    Route::post('/create','Auth\RegisterController@create');
    Route::get('/login','Auth\LoginController@index');
    Route::post('/post-login','Auth\LoginController@login');


