<?php

namespace CodeProject\Services;
use CodeProject\Repositories\Cadastros\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use CodeProject\Repositories\Cadastros\UserRepository;

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

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, UserRepository $userRepository){
        $this->repository = $repository;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    public function all($userId){
        try {
            return $this->repository->with('cliente')->with('dono')->with('membros')->findWhere(['owner_id'=>$userId]);
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
            return $this->repository->with('cliente')->with('dono')->with('membros')->find($id);
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
            $this->repository->skipPresenter()->find($id)->fill($data)->save();
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

    public function destroy($id){
        try {
            $this->repository->skipPresenter()->find($id)->delete();
            return ['success' => true, 'message' => 'Project deletado com sucess!'] ;
        }catch (ModelNotFoundException $e) {
            return [
                'error'=>true,
                'message'=>'Project não encontrado.'
            ];
        } catch (\Exception $e) {
            $message = $e->getMessage();
            if(strpos($message, "No query results for model") !==false){
                $message = 'Não existe project cadatrado para o id '.$id;
            }
            else if (strpos($message, "Foreign key violation") !==false){
                $message = 'Project não pode ser apagado pois existe um ou mais projects vinculados a ele!';
            }
            return [
                'error'=>true,
                'message'=> $message
            ];
        }
    }

    function addMember($id, $memberId){
        try {
            if(intval ($memberId) < 1)
                return ['error'=>true, 'message'=>'Campo memberId deve ser um número interiro positivo!'];

            $member = $this->userRepository->find($memberId);
            $this->repository->with('membros')->skipPresenter()->find($id)->membros()->attach($member);
            return ['success'=>true, 'message'=>'Membro adicionado com sucesso!'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project para o id '.$id.' ou usuário cadastrado para o id '.$memberId : $e->getMessage()
            ];
        }
    }

    function removeMember($id, $memberId){
        try {
            if(intval ($memberId) < 1)
                return ['error'=>true, 'message'=>'Campo memberId deve ser um número interiro positivo!'];

            $member = $this->userRepository->find($memberId);
            $this->repository->with('membros')->skipPresenter()->find($id)->membros()->detach($member);

            return ['success'=>true, 'message'=>'Membro removido com sucesso!'];
        }catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message'=>'Project ou usuário não encontrado.'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project para o id '.$id.' ou usuário cadastrado para o id '.$memberId : $e->getMessage()
            ];
        }
    }

    function showMembers($id){
        try {
            return $this->repository->with('membros')->skipPresenter()->find($id)->membros;
        }catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message'=>'Project não encontrado.'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project cadatrado para o id '.$id : $e->getMessage()
            ];
        }
    }

    function isMember($id, $memberId){
        try {
            $project = $this->repository->with('membros')->skipPresenter()->find($id);

            foreach($project->membros as $member){
                if($member->id == $memberId){
                    return true;
                }
            }

            return $this->isOwner($id, $memberId);
        }catch (ModelNotFoundException $e) {
            return ['error'=>true, 'message'=>'Project não encontrado.'];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project ou usuário cadatrado para o id '.$id : $e->getMessage()
            ];
        }
    }

    function isOwner($projectId, $userId){
        try {
            $project = $this->repository->skipPresenter()->find($projectId);
            return $project->owner_id == $userId;
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe project ou usuário cadatrado para o id '.$userId : $e->getMessage()
            ];
        }
    }
}