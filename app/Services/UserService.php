<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserServices
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}