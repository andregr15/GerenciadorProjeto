<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\Cadastros\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members', 'notes', 'tasks'];

    public function transform(Project $project){
        return [
            'project_id' => $project->id,
            'project' => $project->nome,
            'client_id' => $project->cliente->id,
            'client_name' => $project->cliente->nome,
            'owner_id' => $project->owner_id,
            'description' => $project->descricao,
            'progress' => $project->progresso,
            'status' => $project->status,
            'due_date' => $project->data_vencimento,
        ];
    }

    public function includeMembers(Project $project){
        return $this->collection($project->membros, new ProjectMemberTransformer());
    }

    public function includeNotes(Project $project){
        return $this->collection($project->notas, new ProjectNoteTransformer());
    }

    public function includeTasks(Project $project){
        return $this->collection($project->tarefas, new ProjectTaskTransformer());
    }

}