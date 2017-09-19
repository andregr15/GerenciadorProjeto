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

    /**
     * Projeto
     */
    Route::middleware('checkProjectOwner')->group(function(){
        Route::resource('/project', 'Cadastros\ProjectController', ['except' => ['create', 'edit', 'index', 'update', 'show']]);
    });

    Route::middleware('checkProjectMemberOwner')->group(function(){
        Route::resource('/project', 'Cadastros\ProjectController', ['except' => ['create', 'edit', 'destroy', 'store']]);

        Route::prefix('/project')->group(function(){

            /**
             * Notas Projeto
             */
            Route::get('/{projectId}/notes', 'Cadastros\ProjectNoteController@showAll');
            Route::get('/{projectId}/notes/{noteId}', 'Cadastros\ProjectNoteController@show');
            Route::post('/{projectId}/notes', 'Cadastros\ProjectNoteController@create');
            Route::put('/{projectId}/notes/{noteId}', 'Cadastros\ProjectNoteController@update');
            Route::delete('/{projectId}/notes/{noteId}', 'Cadastros\ProjectNoteController@destroy');

            /**
             * Tarefas Projeto
             */
            Route::get('/{projectId}/tasks', 'Cadastros\ProjectTaskController@showAll');
            Route::get('/{projectId}/tasks/{taskId}', 'Cadastros\ProjectTaskController@show');
            Route::post('/{projectId}/tasks', 'Cadastros\ProjectTaskController@create');
            Route::put('/{projectId}/tasks/{taskId}', 'Cadastros\ProjectTaskController@update');
            Route::delete('/{projectId}/tasks/{taskId}', 'Cadastros\ProjectTaskController@destroy');

            /**
             * Membros Projeto
             */
            Route::get('/{projectId}/members', 'Cadastros\ProjectController@showMembers');
            Route::get('/{projectId}/members/{memberId}', 'Cadastros\ProjectController@isMember');
            Route::post('/{projectId}/members', 'Cadastros\ProjectController@addMember');
            Route::delete('/{projectId}/members/{memberId}', 'Cadastros\ProjectController@removeMember');

            /**
             * Arquivos Projeto
             */
            Route::get('/{projectId}/files', 'Cadastros\ProjectFileController@index');
            Route::post('/{projectId}/files', 'Cadastros\ProjectFileController@store');
            Route::delete('/{projectId}/files/{fileId}', 'Cadastros\ProjectFileController@destroy');
        });
    });

    Route::get('/project', 'Cadastros\ProjectController@index');
});



