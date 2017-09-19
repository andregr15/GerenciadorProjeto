<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:33
 */

namespace CodeProject\Transformers;


use CodeProject\Entities\Cadastros\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTransformer extends TransformerAbstract
{
    function transform(ProjectNote $note){
        return [
            'project_id'=> $note->project->id,
            'note_id'=> $note->id,
            'title'=> $note->titulo,
            'note'=> $note->nota
        ];
    }
}