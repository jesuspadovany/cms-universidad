<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Http\Requests\StorePageImageRequest;
use App\Page;
//use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function create()
    {
        return view('admin.courses.create', [
            'categories' => Category::whereModuleIsCourses()->get()
        ]);
    }

    public function store(StoreCourseRequest $request)
    {
        $course = new Course;
        $course->ubicacion = $request->ubicacion;
        $course->nombre = $request->nombre;
        $course->descripcion_curso = $request->descripcion_curso;
        $course->descipcion = $request->descripcion;
        $course->precio = $request->precio;
        $course->horarios = $request->horario;
        $course->imagen = $request->file('image');
        $course->material = $request->file('material');
        $course->profesor = $request->profesor;
        $course->anfitrion = $request->anfitrion;
        $course->clase = $request->clase;
        $course->duracion = $request->duracion;

        $course->save();

        $course->categories()->attach($request->categories);

        return redirect()->route('admin.courses.index')->with('alert', [
            'type' => 'success',
            'message' => 'El curso ha sido guardado'
        ]);
    }

    public function index()
    {
        return view('admin.courses.index', [
            'page' => Page::where('name', 'cursos')->first(),
            'cursos' => Course::with('categories')->orderBy('nombre')->get(),
        ]);
    }

    public function changePageImage()
    {
        return view('admin.courses.change-page-image');
    }

    public function storePageImage(StorePageImageRequest $storePageImageRequest)
    {
        $imagePath = Storage::url($storePageImageRequest->image->store('public/pages'));

        $page = Page::where('name', 'cursos')->first();

        $page->image = $imagePath;

        $page->save();

        return redirect()->route('admin.courses.index')->with('alert', [
            'type' => 'success',
            'message' => 'La imagen ha sido actualizada'
        ]);
    }

    //Eliminar
    public function delete(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('alert', [
            'type' => 'success',
            'message' => 'El curso se ha eliminado correctamente'
        ]);

    }

    public function updateCourseComponent(Course $course)
    {
        $course->load('categories');

        return view('admin.courses.update', [
            'categories' => Category::whereModuleIsCourses()->get(),
            'curso' => $course
        ]);
    }

    public function storeUpdate(UpdateCoursesRequest $request , Course $course)
    {      
        $course->update(['ubicacion' => $request->ubicacion,
                      'nombre' => $request->nombre,
                      'descripcion_curso' => $request->descripcion_curso,
                      'descipcion' => $request->descripcion,
                      'precio' => $request->precio,
                      'horarios' => $request->horario,
                      'profesor' => $request->profesor,
                      'anfitrion' => $request->anfitrion,
                      'clase' => $request->clase,
                      'duracion' => $request->duracion,
                    ]);
            $course->categories()->sync($request->categories);        

        return redirect()->route('admin.courses.index')->with('alert', [
            'type' => 'success',
            'message' => 'El curso ha sido actualizado'
        ]);
    }
}
