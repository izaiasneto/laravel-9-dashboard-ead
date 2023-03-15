<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\{
    CourseService,
    ModuleService,
};

class ModuleController extends Controller
{
    protected $repository;
    protected $repositoryCourse;

    public function __construct(CourseService $repositoryCourse, ModuleService $repository)
    {
        $this->repository = $repository;
        $this->repositoryCourse = $repositoryCourse;
    }

    public function index($courseId)
    {
       if (!$course = $this->repositoryCourse->findById($courseId))
            return back();

       $data = $this->repository->getAllByCourseId($courseId);
       $modules = convertItemsOfArrayToObject($data);

       return view('admin.courses.modules.index', compact('course', 'modules'));
    }
}
