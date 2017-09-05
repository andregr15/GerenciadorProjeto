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

Route::get('/client', 'Cadastros\ClientController@index');
Route::get('/client/{id}', 'Cadastros\ClientController@show');
Route::post('/client', 'Cadastros\ClientController@store');
Route::put('/client/{id}', 'Cadastros\ClientController@update');
Route::delete('/client/{id}', 'Cadastros\ClientController@destroy');
