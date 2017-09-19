<?php
/**
 * Created by PhpStorm.
 * User: Desenvolvimento
 * Date: 19/09/2017
 * Time: 09:13
 */

namespace CodeProject\Services;


use CodeProject\Repositories\Cadastros\ProjectFileRepository;
use CodeProject\Repositories\Cadastros\ProjectRepository;
use CodeProject\Validators\ProjectFileValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;

class ProjectFileService
{
    /**
     * @var ProjectFileRepository
     */
    private $repository;
    /**
     * @var ProjectFileValidator
     */
    private $validator;

    /**
     * @var Storage
     */
    private $storage;
    /**
     * @var ProjectFileRepository
     */
    private $fileRepository;

    function __construct(ProjectRepository $repository, ProjectFileRepository $fileRepository, ProjectFileValidator $validator, Storage $storage){
        $this->repository = $repository;
        $this->validator = $validator;
        $this->storage = $storage;
        $this->fileRepository = $fileRepository;
    }

    function all($projectId){
        try {
            return $this->fileRepository->findWhere(['project_id'=>$projectId]);
        }catch(\Exception $e){
            return [
                'error'=>'true',
                'message'=> $e->getMessage()
            ];
        }
    }

    function store(array $data, $projectId){
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->createFile($data, $projectId);
        }catch(ValidatorException $e){
            return [
                'error'=>'true',
                'message'=> $e->getMessageBag()
            ];
        }catch(\Exception $e){
            return [
                'error'=>'true',
                'message'=> $e->getMessage()
            ];
        }
    }

    function destroy($fileId){
        try {
            $file = $this->fileRepository->find($fileId);
            $this->storage->delete($fileId.'.'.$file->extensao);
            $file->delete();
            return ['success'=>true, 'message'=>'Arquivo deletado com sucesso!'];
        }catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Project não encontrado.'
            ];
        }catch(\Exception $e){
            return [
                'error'=>'true',
                'message'=> $e->getMessage()
            ];
        }
    }

    private function createFile(array $data, $projectId){
        $file = $data['file'];

        $data['extensao']=$file->getClientOriginalExtension();
        $fileSaved = $this->repository->skipPresenter()->find($projectId)->files()->create($data);
        $this->storage->put($fileSaved->id . '.' . $data['extensao'], file_get_contents($file->getRealPath()));
        return $fileSaved;
    }
}