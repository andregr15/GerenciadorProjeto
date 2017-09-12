<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 12/09/2017
 * Time: 14:42
 */

namespace CodeProject\Repositories\Cadastros;


use Prettus\Repository\Eloquent\BaseRepository;
use CodeProject\Entities\Cadastros\ProjectNote;

class ProjectNoteRepositoryEloquent extends BaseRepository implements ProjectNoteRepository
{
    public function model(){
        return ProjectNote::class;
    }
}