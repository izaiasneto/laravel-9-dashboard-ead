<?php

namespace App\Http\Controllers\Admin;

use App\Services\{
    ModuleService,
    LessonService
};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected $service;
    protected $serviceModule;

    public function __construct(ModuleService $serviceModule, LessonService $service)
    {
        $this->service = $service;
        $this->serviceModule = $serviceModule;
    }

    public function index(Request $request, $moduleId)
    {
       if (!$module = $this->serviceModule->findById($moduleId))
            return back();

       $data = $this->service->getAllByModuleId(
            moduleId: $moduleId,
            filter: $request->filter ?? ''
       );
       $lessons = convertItemsOfArrayToObject($data);

       return view('admin.courses.modules.lessons.index', compact('module', 'lessons'));
    }

    public function create($moduleId)
    {
        if (!$module = $this->serviceModule->findById($moduleId))
            return back();

        return view('admin.courses.modules.lessons.create', compact('module'));
    }

    public function store(StoreUpdateLesson $request, $moduleId)
    {
        if (!$this->serviceModule->findById($moduleId))
            return back();
        
        $data = $request->only(['name', 'video', 'description']);

        $this->service->createByModule($moduleId, $data);
        
        return redirect()->route('lessons.index', $moduleId);
    }

    public function edit($moduleId, $id)
    {
        if (!$module = $this->serviceModule->findById($moduleId))
            return back();
        
        if (!$lesson = $this->service->findById($id))
            return back();

        return view('admin.courses.modules.lessons.edit', compact('module', 'lesson'));
    }

    public function update(StoreUpdateLesson $request, $moduleId, $id)
    {
        if (!$this->serviceModule->findById($moduleId))
            return back();
        
        
        $data = $request->only(['name', 'video', 'description']);

        $lesson = $this->service->update($id, $data );
        
        return redirect()->route('lessons.index', $moduleId);
    }

    public function show($moduleId, $id)
    {
        if (!$module = $this->serviceModule->findById($moduleId))
            return back();
        
        if (!$lesson = $this->service->findById($id))
            return back();

        return view('admin.courses.modules.lessons.show', compact('module', 'lesson'));
    }

    public function destroy($moduleId, $id) {
        
        if(!$this->service->delete($id))
            return back();
        
            return redirect()->route('lessons.index', $moduleId);
    }
}
