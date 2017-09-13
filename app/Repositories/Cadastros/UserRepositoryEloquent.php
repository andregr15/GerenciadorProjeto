<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 13/09/2017
 * Time: 09:36
 */

namespace CodeProject\Repositories\Cadastros;


use CodeProject\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    function model(){
        return User::class;
    }
}