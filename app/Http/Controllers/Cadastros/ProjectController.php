<?php

namespace CodeProject\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Services\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    private $service;

    public function __construct(ProjectService $service){
        $this->service = $service;
    }

    public function index(){
        return $this->service->all(Auth::user()->getAuthIdentifier());
    }

    public function show($id){
        return $this->service->find($id);
    }

    public function store(Request $request){
        return $this->service->create($request->all());
    }

    public function update(Request $request, $id){
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id){
        return $this->service->destroy($id);
    }

    public function showMembers($id){
        return $this->service->showMembers($id);
    }

    public function isMember($projectId, $memberId){
        return ['isMember'=>$this->service->isMember($projectId, $memberId)];
    }

    public function addMember(Request $request, $projectId){
        return $this->service->addMember($projectId, $request->get('memberId'));
    }

    public function removeMember($projectId, $memberId){
        return $this->service->removeMember($projectId, $memberId);
    }
}
