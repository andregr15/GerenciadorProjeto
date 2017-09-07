<?php

namespace CodeProject\Http\Controllers\Cadastros;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Services\ProjectService;

class ProjectController extends Controller
{
    private $service;

    public function __construct(ProjectService $service){
        $this->service = $service;
    }

    public function index(){
        return $this->service->all();
    }

    public function show($id){
        return $this->service->find($id);
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function update(Request $request, $id){
        return $this->service->update($request->all(), $id);
    }

    public function destroy($id){
        return $this->service->delete($id);
    }
}
