<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Entities\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function index(){
        return Client::all();
    }

    function store(Request $request){
        return Client::create($request->all());
    }

    function update(Request $request, $id){
        $cli = Client::find($id);
        $cli->fill($request->all());
        $cli->save();
        return $cli;
    }

    function show($id){
        return Client::find($id);
    }

    function destroy($id){
        return Client::destroy($id);
    }
}
