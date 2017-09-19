<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:51
 */

namespace CodeProject\Transformers;


use CodeProject\Entities\Cadastros\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    function transform(Client $client){
        return [
            'client_id'=> $client->id,
            'name'=>$client->nome,
            'responsible'=>$client->responsavel,
            'phone'=>$client->telefone,
            'address'=>$client->endereco,
            'observation'=>$client->obs
        ];
    }
}