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

/**
 * Cliente
 */

Route::get('/client', 'Cadastros\ClientController@index');
Route::get('/client/{id}', 'Cadastros\ClientController@show');
Route::post('/client', 'Cadastros\ClientController@store');
Route::put('/client/{id}', 'Cadastros\ClientController@update');
Route::delete('/client/{id}', 'Cadastros\ClientController@destroy');

/**
 * Notas Projeto
 */

Route::get('/project/{projectId}/notes', 'Cadastros\ProjectNoteController@showAll');
Route::get('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@show');
Route::post('/project/{projectId}/notes', 'Cadastros\ProjectNoteController@create');
Route::put('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@update');
Route::delete('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@delete');

/**
 * Tarefas Projeto
 */

Route::get('/project/{projectId}/tasks', 'Cadastros\ProjectTaskController@showAll');
Route::get('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@show');
Route::post('/project/{projectId}/tasks', 'Cadastros\ProjectTaskController@create');
Route::put('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@update');
Route::delete('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@delete');


Route::get('/project/{id}/member/{member}', 'Cadastros\ProjectController@member');

/**
 * Projeto
 */




Route::get('/project', 'Cadastros\ProjectController@index');
Route::get('/project/{id}', 'Cadastros\ProjectController@show');
Route::post('/project', 'Cadastros\ProjectController@store');
Route::put('/project/{id}', 'Cadastros\ProjectController@update');
Route::delete('/project/{id}', 'Cadastros\ProjectController@destroy');


