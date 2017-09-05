<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'nome',
        'responsavel',
        'email',
        'telefone',
        'endereco',
        'obs'
    ];
}
