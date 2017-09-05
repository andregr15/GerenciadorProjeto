<?php

namespace CodeProject\Http\Controllers\Cadastros;

use CodeProject\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeProject\Repositories\Cadastros\ClientRepository;

class ClientController extends Controller
{
    /**
    * @var ClientRepository
    */
    private $repository;

    public function __construct(ClientRepository $repository){
        $this->repository = $repository;
    }

    function index(){
        return  $this->repository->all();
    }

    function store(Request $request){
        return $this->repository->create($request->all());
    }

    function update(Request $request, $id){
        return $this->repository->update($request->all(), $id);
    }

    function show($id){
        return $this->repository->find($id);
    }

    function destroy($id){
        return $this->repository->delete($id) == 1 ? ['sucess' => 'true'] : ['fail' => 'true'];
    }
}
