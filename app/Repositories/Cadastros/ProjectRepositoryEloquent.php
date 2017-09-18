<?php

namespace CodeProject\Repositories\Cadastros;


use CodeProject\Presenters\ProjectPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\Project;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model(){
        return Project::class;
    }

    public function presenter(){
        return ProjectPresenter::class;
    }

}