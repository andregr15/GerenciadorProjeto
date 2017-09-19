<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 09:12
 */

namespace CodeProject\Repositories\Cadastros;


use CodeProject\Entities\Cadastros\ProjectFile;
use Prettus\Repository\Eloquent\BaseRepository;

class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository
{
    function model(){
        return ProjectFile::class;
    }
}