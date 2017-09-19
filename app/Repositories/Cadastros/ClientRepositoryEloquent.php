<?php

namespace CodeProject\Repositories\Cadastros;

use CodeProject\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository {

    public function model(){
        return Client::class;
    }

    function presenter(){
        return ClientPresenter::class;
    }
}
