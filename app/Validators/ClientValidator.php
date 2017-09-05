<?php

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
      'nome'=> 'required|max:255',
      'responsavel'=> 'required|max:255',
      'email'=> 'required|email',
      'telefone'=> 'required',
      'endereco'=> 'required'
    ];
}