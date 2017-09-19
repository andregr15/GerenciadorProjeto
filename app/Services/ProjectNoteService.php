<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 12/09/2017
 * Time: 14:53
 */

namespace CodeProject\Services;

use CodeProject\Repositories\Cadastros\ProjectnoteRepository;
use CodeProject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class ProjectNoteService
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var ProjectNoteValidator
     */
    private $validator;

    function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator){

        $this->repository = $repository;
        $this->validator = $validator;
    }

    function showAll($projectId){
        try{
            return $this->repository->findWhere(['project_id'=>$projectId]);
        }
        catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=> $e->getMessage()
            ];
        }
    }

    function show($projectId, $id){
        try{
            return $this->repository->findWhere(['project_id'=>$projectId, 'id'=>$id]);
        }
        catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=> $e->getMessage()
            ];
        }
    }

    function create(array $data){
        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        } catch(ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        } catch (\Exception $e) {
            return [
                'error'=>true,
                'message'=> $e->getMessage()
            ];
        }
    }

     function update(array $data, $id){
        try{
            $this->validator->with($data)->passesOrFail();
            $this->repository->skipPresenter()->find($id)->fill($data)->save();
            return ['success'=>true, 'message' => 'Nota atualizada com sucesso!'];
        } catch(ValidatorException $e){
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        } catch(\Exception $e){
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe nota cadatrada(o) com o id '.$id : $e->getMessage()
            ];
        }
    }

    function delete($id){
        try{
            $this->repository->skipPresenter()->find($id)->delete();
            return ['success'=>true, 'message'=>'Nota deletada com sucesso!'];
        }catch(\Exception $e){
            return [
                'error'=>true,
                'message'=>strpos($e->getMessage(), 'No query results for model') !== false ? 'Não existe nota cadatrada com o id '.$id : $e->getMessage()
            ];
        }
    }
}