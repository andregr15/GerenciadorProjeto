<?php

namespace CodeProject\Http\Controllers\Cadastros;

use CodeProject\Services\ProjectFileService;
use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;

class ProjectFileController extends Controller
{

    /**
     * @var ProjectFileService
     */
    private $service;

    function __construct(ProjectFileService $service){
        $this->service = $service;
    }


    function index($projectId){
        return $this->service->all($projectId);
    }

    function store(Request $request, $projectId){
        return $this->service->store($request->all(), $projectId);
    }

    function destroy($projectId, $fileId){
        return $this->service->destroy($fileId);
    }
}
