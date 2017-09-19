<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $fillable=[
        'project_id',
        'nome',
        'descricao',
        'extensao'
    ];

    function project(){
        return $this->belongsTo(Project::class);
    }
}
