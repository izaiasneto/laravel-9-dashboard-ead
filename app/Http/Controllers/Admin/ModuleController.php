<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{
    ModuleService,
};

class ModuleController extends Controller
{
    protected $repository;

    public function __construct(ModuleService $repository)
    {
        $this->repository = $repository;
    }

    public function index($courseId)
    {
       $this->repository->getAllByCourseId($courseId);
    }
}
