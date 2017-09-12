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

    function show($projectId, $id){
        return $this->service->show($projectId, $id);
    }

    function create(Request $request){
        return $this->service->create($request->all());
    }

    function update(Request $request, $projectId, $id){
        return $this->service->update($request->all(), $id);
    }

    function delete($projectId, $id){
        return $this->service->delete($id);
    }

}
