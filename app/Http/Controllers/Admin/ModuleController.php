<?php

namespace App\Http\Controllers\Admin;

use App\Services\{
    CourseService,
    ModuleService,
};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use Illuminate\Http\Request;


class ModuleController extends Controller
{
    protected $service;
    protected $serviceCourse;

    public function __construct(CourseService $serviceCourse, ModuleService $service)
    {
        $this->service = $service;
        $this->serviceCourse = $serviceCourse;
    }

    public function index(Request $request, $courseId)
    {
       if (!$course = $this->serviceCourse->findById($courseId))
            return back();

       $data = $this->service->getAllByCourseId(
            courseId: $courseId,
            filter: $request->filter ?? ''
       );
       $modules = convertItemsOfArrayToObject($data);

       return view('admin.courses.modules.index', compact('course', 'modules'));
    }

    public function create($courseId)
    {
        if (!$course = $this->serviceCourse->findById($courseId))
            return back();

        return view('admin.courses.modules.create', compact('course'));
    }

    public function store(StoreUpdateModule $request, $courseId)
    {
        if (!$this->serviceCourse->findById($courseId))
            return back();

        $this->service
                ->createByCourse($courseId, $request->only(['name']));
        
        return redirect()->route('modules.index', $courseId);
    }

    public function edit($courseId, $id)
    {
        if (!$course = $this->serviceCourse->findById($courseId))
            return back();
        
        if (!$module = $this->service->findById($id))
            return back();

        return view('admin.courses.modules.edit', compact('course', 'module'));
    }

    public function update(StoreUpdateModule $request, $courseId, $id)
    {
        if (!$this->serviceCourse->findById($courseId))
            return back();
        
        $module = $this->service->update($id, $request->only(['name']));
        
        return redirect()->route('modules.index', $courseId);
    }

    public function show($courseId, $id)
    {
        if (!$course = $this->serviceCourse->findById($courseId))
            return back();
        
        if (!$module = $this->service->findById($id))
            return back();

        return view('admin.courses.modules.show', compact('course', 'module'));
    }

    public function destroy($courseId, $id) {
        
        if(!$this->service->delete($id))
            return back();
        
            return redirect()->route('modules.index', $courseId);
    }
}
