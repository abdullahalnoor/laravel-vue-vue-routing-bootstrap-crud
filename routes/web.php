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

Route::resource('task','TodoController');
Route::post('store','TodoController@store');
Route::put('update','TodoController@update');
Route::get('edit/{id}','TodoController@edit');
Route::get('del/{id}','TodoController@del');
