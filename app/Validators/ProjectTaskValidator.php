<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 12/09/2017
 * Time: 14:54
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator
{
    protected $rules =[
        'project_id'=>'required|integer',
        'nome'=>'required|string',
        'data_inicio'=>'required|date',
        'data_vencimento'=>'required|date',
        'status'=>'required|string'
    ];
}