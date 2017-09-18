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
//Route::prefix('/client')->middleware('client_credentials')->group(function () {
//    Route::get('/', 'Cadastros\ClientController@index');
//    Route::get('/{id}', 'Cadastros\ClientController@show');
//    Route::post('/', 'Cadastros\ClientController@store');
//    Route::put('/{id}', 'Cadastros\ClientController@update');
//    Route::delete('/{id}', 'Cadastros\ClientController@destroy');
//});

/**
 * Notas Projeto
 */
//Route::get('/project/{projectId}/notes', 'Cadastros\ProjectNoteController@showAll');
//Route::get('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@show');
//Route::post('/project/{projectId}/notes', 'Cadastros\ProjectNoteController@create');
//Route::put('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@update');
//Route::delete('/project/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@delete');

/**
 * Tarefas Projeto
 */
//Route::get('/project/{projectId}/tasks', 'Cadastros\ProjectTaskController@showAll');
//Route::get('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@show');
//Route::post('/project/{projectId}/tasks', 'Cadastros\ProjectTaskController@create');
//Route::put('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@update');
//Route::delete('/project/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@delete');

/**
 * Membros Projeto
 */
//Route::get('/project/{id}/member', 'Cadastros\ProjectController@showMembers');
//Route::get('/project/{id}/member/{memberId}', 'Cadastros\ProjectController@isMember');
//Route::post('/project/{id}/member', 'Cadastros\ProjectController@addMember');
//Route::delete('/project/{id}/member/{memberId}', 'Cadastros\ProjectController@removeMember');

/**
 * Projeto
 */
//Route::get('/project', 'Cadastros\ProjectController@index');
//Route::get('/project/{id}', 'Cadastros\ProjectController@show');
//Route::post('/project', 'Cadastros\ProjectController@store');
//Route::put('/project/{id}', 'Cadastros\ProjectController@update');
//Route::delete('/project/{id}', 'Cadastros\ProjectController@destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
