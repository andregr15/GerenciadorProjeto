<?php

namespace CodeProject\Services;


use CodeProject\Repositories\Cadastros\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    private $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator){
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function all(){
        return $this->repository->all();
    }

    public function find($id){
        return $this->repository->find($id);
    }

    public function delete($id){
        return $this->repository->delete($id) == 1 ? ['success' => 'true'] : ['success' => 'false'];
    }

    public function create(array $data){
        // enviar um email
        // dispara notificação
        // postar um tweet

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
}