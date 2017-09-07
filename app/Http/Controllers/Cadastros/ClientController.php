<?php

namespace CodeProject\Http\Controllers\Cadastros;

use CodeProject\Http\Controllers\Controller;
use CodeProject\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ClientService $service){
        $this->service = $service;
    }

    function index(){
        return  $this->service->all();
    }

    function store(Request $request){
        return $this->service->create($request->all());
    }

    function update(Request $request, $id){
        return $this->service->update($request->all(), $id);
    }

    function show($id){
        return $this->service->find($id);
    }

    function destroy($id){
        return $this->service->delete($id);
    }
}
