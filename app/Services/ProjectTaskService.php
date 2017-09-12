<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 12/09/2017
 * Time: 14:53
 */

namespace CodeProject\Services;

use CodeProject\Repositories\Cadastros\ProjectTaskRepository;
use CodeProject\Validators\ProjectTaskValidator;

class ProjectTaskService
{
    /**
     * @var ProjectTaskRepository
     */
    private $repository;

    /**
     * @var ProjectTaskValidator
     */
    private $validator;

    function __construct(ProjectTaskRepository $repository, ProjectTaskValidator $validator){

        $this->repository = $repository;
        $this->validator = $validator;
    }
}