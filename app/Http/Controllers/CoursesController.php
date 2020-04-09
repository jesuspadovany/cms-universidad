<?php

namespace App\Http\Controllers;

use App\Page;

class CoursesController extends Controller
{
    public function index()
    {
    	return view('courses.index', [
             'page' => Page::where('name', 'cursos')->first()
        ]);
    }
}
