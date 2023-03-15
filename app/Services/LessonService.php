<?php

namespace App\Services;

use App\Repositories\LessonRepositoryInterface;

class LessonService
{
    private $repository;

    public function __construct(LessonRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllByModuleId(string $moduleId, string $filter = ''): array
    {
        $lessons = $this->repository->getAllByModuleId($moduleId, $filter);

        return convertItemsOfArrayToObject($lessons);      
    }
    
    public function createByModule(string $moduleId, array $data)
    {
        $this->repository->createByModule($moduleId, $data);     
    }

    public function findById(string $id)
    {
       return $this->repository->findById($id);
    }

    public function update(string $id, array $data)
    {
       return $this->repository->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }
}