<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 12/09/2017
 * Time: 14:44
 */

namespace CodeProject\Repositories\Cadastros;


use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\ProjectTask;

class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    public function model(){
        return ProjectTask::class;
    }
}