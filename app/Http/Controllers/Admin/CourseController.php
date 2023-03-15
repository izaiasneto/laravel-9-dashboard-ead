<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourse;
use App\Services\{
    CourseService,
    UploadFile,
};

use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }
    
    public function index(Request $request)
    {
        $courses = $this->service->getAll(
            filter: $request->filter ?? ""
        );

        return view('admin.courses.index', compact('courses'));
    }

    public function create(Request $request)
    {
        return view('admin.courses.create');
    }

    public function store(StoreCourse $request, UploadFile $uploadFile)
    {
        $data = $request->only('name');
        $data['available'] = isset($request->available);
       
        if ($request->image) {
             $data['image'] = $uploadFile->store($request->image, 'courses');
        }

        $this->service->create($data);

        return redirect()->route('courses.index');
    }
}
