<?php

namespace CodeProject\Repositories\Cadastros;

use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository {

    public function model(){
        return Client::class;
    }
}
