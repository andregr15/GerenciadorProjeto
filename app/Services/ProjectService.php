<?php

namespace CodeProject\Services;
use CodeProject\Repositories\Cadastros\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @var ProjectValidator
     */
    private $validator;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all(){
        return $this->repository->with('cliente')->with('dono')->all();
    }

    public function find($id){
        return $this->repository->with('cliente')->with('dono')->find($id);
    }

    public function create(array $data){
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch(ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch(ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

    public function delete($id){
        return $this->repository->delete($id) == 1 ? ['success'=>true] : ['success'=>false];
    }
}