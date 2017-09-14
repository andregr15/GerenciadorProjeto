<?php

namespace CodeProject\Entities\Cadastros;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $table = 'project_members';
    //

    protected $fillable =[
      'project_id',
      'user_id'
    ];
}
