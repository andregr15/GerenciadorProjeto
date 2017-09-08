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
        try {
            return $this->repository->all();
        }
        catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=> $e->getMessage()
            ];
        }
    }

    public function find($id){
        try{
            return $this->repository->find($id);
        } catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message'=>'Client não encontrado.'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe client cadatrado para o id '.$id : $e->getMessage()
            ];
        }

    }

    public function delete($id){
        try{
            $this->repository->find($id)->delete();
            return ['success' => 'true', 'message'=>'Client deletado com sucesso!'];
        }catch (QueryException $e) {
            return [
                'error'=>true,
                'message'=>'Client não pode ser apagado pois existe um ou mais projetos vinculados a ele.'
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error'=>true,
                'message'=>'Client não encontrado.'
            ];
        } catch (\Exception $e) {
            $message = $e->getMessage();
            if(strpos($message, "No query results for model") !==false){
                $message = 'Não existe client cadatrado para o id '.$id;
            }
            else if (strpos($message, "Foreign key violation") !==false){
                $message = 'Client não pode ser apagado pois existe um ou mais projects vinculados a ele!';
            }
            return [
                'error'=>true,
                'message'=> $message
            ];
        }
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
        }catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>$e->getMessage()
            ];
        }

    }

    public function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            $this->repository->find($id)->fill($data)->save();
            return ['sucess'=>true, 'message'=>'Client atualizado com sucesso!'];
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
}