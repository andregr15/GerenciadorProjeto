<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    //
    protected $fillable = [
        'project_id',
        'nome',
        'data_inicio',
        'data_vencimento',
        'status'
    ];
}
