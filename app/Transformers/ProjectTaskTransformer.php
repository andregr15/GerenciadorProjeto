<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 08:40
 */

namespace CodeProject\Transformers;


use CodeProject\Entities\Cadastros\ProjectTask;
use League\Fractal\TransformerAbstract;

class ProjectTaskTransformer extends TransformerAbstract
{
    function transform(ProjectTask $task){
        return [
            'project_id'=> $task->project->id,
            'task_id'=>$task->id,
            'name'=>$task->nome,
            'start_date'=> $task->data_inicio,
            'due_date'=>$task->data_vencimento,
            'status'=>$task->status
        ];
    }
}