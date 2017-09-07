<?php

namespace CodeProject\Repositories\Cadastros;


use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\Project;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model(){
        return Project::class;
    }
}