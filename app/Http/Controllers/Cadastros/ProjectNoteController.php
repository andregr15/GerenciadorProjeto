<?php

namespace CodeProject\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Services\ProjectNoteService;

class ProjectNoteController extends Controller
{

    /**
     * @var ProjectNoteService
     */
    private $service;

    function __construct(ProjectNoteService $service){

        $this->service = $service;
    }

    function showAll($projectId){
        return $this->service->showAll($projectId);
    }

    function show($projectId, $noteId){
        return $this->service->show($projectId, $noteId);
    }

    function create(Request $request){
        return $this->service->create($request->all());
    }

    function update(Request $request, $projectId, $noteId){
        return $this->service->update($request->all(), $noteId);
    }

    function destroy($projectId, $noteId){
        return $this->service->delete($noteId);
    }

}
