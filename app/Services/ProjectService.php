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
        try {
            return $this->repository->with('cliente')->with('dono')->all();
        }
        catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=> $e->getMessage()
            ];
        }
    }

    public function find($id){
        try {
            return $this->repository->with('cliente')->with('dono')->find($id);
        }catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message'=>'Project não encontrado.'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project cadatrado para o id '.$id : $e->getMessage()
            ];
        }
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
        catch (\Exception $e) {
            return [
                'error'=> true,
                'message'=> $e->getMessage()
            ];
        }
    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            $this->repository->find($id)->fill($data)->save();
            return ['sucess'=>true, 'message'=>'Project atualizado com sucesso!'];
        }
        catch(ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
        catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe client cadatrado para o id '.$id : $e->getMessage()
            ];
        }
    }

    public function delete($id){
        try {
            $this->repository->find($id)->delete();
            return ['success' => true, 'message' => 'Project deletado com sucess!'] ;
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true,
                'message'=>'Project não encontrado.'
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project cadatrado para o id '.$id : $e->getMessage()
            ];
        }
    }
}