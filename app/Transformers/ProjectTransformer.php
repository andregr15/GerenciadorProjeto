<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\Cadastros\Project;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['membros'];

    public function transform(Project $project){
        return [
            'project_id' => $project->id,
            'project' => $project->nome,
            'client_id' => $project->cliente->id,
            'owner_id' => $project->owner_id,
            'description' => $project->descricao,
            'progress' => $project->progresso,
            'status' => $project->status,
            'due_date' => $project->data_vencimento,
        ];
    }

    public function includeMembros(Project $project){
        return $this->collection($project->membros, new ProjectMemberTransformer());
    }

}