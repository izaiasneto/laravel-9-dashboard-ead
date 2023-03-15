<?php

namespace App\Services;

use App\Repositories\ModuleRepositoryInterface;

class ModuleService
{
    private $repository;

    public function __construct(ModuleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllByCourseId(string $courseId, string $filter = ''): array
    {
        $modules = $this->repository->getAllByCourseId($courseId, $filter);

        return convertItemsOfArrayToObject($modules);      
    }
    
    public function createByCourse(string $courseId, array $data)
    {
        $this->repository->createByCourse($courseId, $data);     
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