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

Route::get('/', 'TaskController@index')->name('welcome');

Route::get('/list', 'TaskController@getAll')->name('list');

Route::get('/add', 'TaskController@add')->name('add');

Route::post('/addData', 'TaskController@store')->name('adddata');