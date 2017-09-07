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
        'data_vencimento'
    ];

    public function dono(){
        return $this->belongsTo('CodeProject\Entities\User', 'owner_id');
    }

    public function cliente(){
        return $this->belongsTo('CodeProject\Entities\Cadastros\Client');
    }
}
