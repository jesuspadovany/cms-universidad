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
             'cursos' => Course::orderBy('nombre')->get(),
             'categories' => Category::getCoursesCategories()
        ]);
    }

    public function cursos($id)
    {
        return view('courses.detalle', [
            'categories' => Category::whereModuleIsLibrary()->get(),
            'cursos' => DB::table('courses')->where('id' , $id)->get()
        ]);
    }
}
