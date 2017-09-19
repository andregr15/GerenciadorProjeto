<?php

namespace CodeProject\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Services\ProjectTaskService;

class ProjectTaskController extends Controller
{

    /**
     * @var ProjectTaskService
     */
    private $service;

    function __construct(ProjectTaskService $service){

        $this->service = $service;
    }

    function showAll($projectId){
        return $this->service->showAll($projectId);
    }

    function show($projectId, $taskId){
        return $this->service->show($projectId, $taskId);
    }

    function create(Request $request){
        return $this->service->create($request->all());
    }

    function update(Request $request, $projectId, $taskId){
        return $this->service->update($request->all(), $taskId);
    }

    function destroy($projectId, $taskId){
        return $this->service->delete($taskId);
    }

}
