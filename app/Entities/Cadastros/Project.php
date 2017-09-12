<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'progresso',
        'status',
        'data_vencimento',
        'owner_id',
        'client_id'
    ];

    public function dono(){
        return $this->belongsTo('CodeProject\Entities\User', 'owner_id');
    }

    public function cliente(){
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function notas(){
        return $this->hasMany(ProjectNote::class);
    }

    public function tarefas(){
        return $this->hasMany(ProjectTask::class);
    }

    public function membros(){
        return $this->belongsToMany('CodeProject\Entities\User', 'project_members');
    }
}
