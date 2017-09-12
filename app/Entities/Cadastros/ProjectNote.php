<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class ProjectNote extends Model
{
    //
    protected $fillable =[
        'project_id',
        'titulo',
        'nota'
    ];
}
