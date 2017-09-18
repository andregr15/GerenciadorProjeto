<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->group( function() {

    /**
     * Cliente
     */
    Route::resource('client', 'Cadastros\ClientController', ['except'=> ['create', 'edit']]);

    Route::prefix('/project')->group(function(){

        /**
         * Notas Projeto
         */
        Route::get('/{projectId}/notes', 'Cadastros\ProjectNoteController@showAll');
        Route::get('/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@show');
        Route::post('/{projectId}/notes', 'Cadastros\ProjectNoteController@create');
        Route::put('/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@update');
        Route::delete('/{projectId}/notes/{id}', 'Cadastros\ProjectNoteController@delete');

        /**
         * Tarefas Projeto
         */
        Route::get('/{projectId}/tasks', 'Cadastros\ProjectTaskController@showAll');
        Route::get('/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@show');
        Route::post('/{projectId}/tasks', 'Cadastros\ProjectTaskController@create');
        Route::put('/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@update');
        Route::delete('/{projectId}/tasks/{id}', 'Cadastros\ProjectTaskController@delete');

        /**
         * Membros Projeto
         */
        Route::get('/{id}/member', 'Cadastros\ProjectController@showMembers');
        Route::get('/{id}/member/{memberId}', 'Cadastros\ProjectController@isMember');
        Route::post('/{id}/member', 'Cadastros\ProjectController@addMember');
        Route::delete('/{id}/member/{memberId}', 'Cadastros\ProjectController@removeMember');
    });

    /**
     * Projeto
     */
    Route::middleware('checkProjectOwner')->group(function(){
        Route::resource('/project', 'Cadastros\ProjectController', ['except' => ['create', 'edit', 'index', 'update', 'show']]);
    });

    Route::middleware('checkProjectMember', 'checkProjectOwner')->group(function(){
        Route::resource('/project', 'Cadastros\ProjectController', ['except' => ['create', 'edit', 'destroy', 'store']]);
    });

    Route::get('/project', 'Cadastros\ProjectController@index');
});



