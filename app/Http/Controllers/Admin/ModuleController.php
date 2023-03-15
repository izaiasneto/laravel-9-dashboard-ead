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

    public function create($courseId)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
            return back();

        return view('admin.courses.modules.create', compact('course'));
    }

    public function store(Request $request, $courseId)
    {
        if (!$this->repositoryCourse->findById($courseId))
            return back();

        $this->repository
                ->createByCourse($courseId, $request->only(['name']));
        
        return redirect()->route('modules.index', $courseId);
    }

    public function edit($courseId, $id)
    {
        if (!$course = $this->repositoryCourse->findById($courseId))
            return back();
        
        if (!$module = $this->repository->findById($id))
            return back();

        return view('admin.courses.modules.edit', compact('course', 'module'));
    }

    public function update(Request $request, $courseId, $id)
    {
        if (!$this->repositoryCourse->findById($courseId))
            return back();
        
        $module = $this->repository->update($id, $request->only(['name']));
        
        return redirect()->route('modules.index', $courseId);
    }
}
