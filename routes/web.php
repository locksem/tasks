<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'TasksController@index');
Route::get('/task','TasksController@add');
Route::post('/task','TasksController@create');
Route::get('/task/{task}','TasksController@edit');
Route::post('/task/{task}','TasksController@update');