<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 07/09/2017
 * Time: 13:14
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'nome' => 'required|max:255',
        'descricao' => 'required',
        'progresso'=> 'required|min:0|max:100|integer',
        'status'=> 'required|max:50',
        'data_vencimento'=> 'required|date',
        'owner_id'=> 'required|integer',
        'client_id'=> 'required|integer',
        ];
}