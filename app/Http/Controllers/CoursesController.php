<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Support\Facades\DB;

use App\Page;

class CoursesController extends Controller
{
    public function index()
    {
    	return view('courses.index', [
            'page' => Page::where('name', 'cursos')->first(),
            'courses' => Course::with(['card', 'categories'])->orderBy('id', 'desc')->get(),
            'categories' => Category::getCoursesCategories()
        ]);
    }

    public function show(Course $course)
    {
        return $course;
        return view('courses.detalle', [
            'categories' => Category::whereModuleIsLibrary()->get(),
            'curso' => $curso
        ]);
    }
}
