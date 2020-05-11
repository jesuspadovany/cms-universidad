<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Course;
use App\Category;
use App\CourseCard;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCoursesRequest;
use App\Http\Requests\StorePageImageRequest;

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
        $course->slug = $request->slug;
        $course->descripcion = $request->descripcion;
        $course->precio = $request->precio;
        $course->horarios = $request->horario;
        $course->imagen = $request->file('image');
        $course->material = $request->file('material');
        $course->profesor = $request->profesor;
        $course->anfitrion = $request->anfitrion;
        $course->tipo = $request->tipo;
        $course->duracion = $request->duracion;

        $course->save();

        $course->categories()->attach($request->categories);

        CourseCard::createFromCourse($course);

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
        $course->update([
            'ubicacion' => $request->ubicacion,
            'nombre' => $request->nombre,
            'slug' => $request->slug,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'horarios' => $request->horario,
            'profesor' => $request->profesor,
            'anfitrion' => $request->anfitrion,
            'tipo' => $request->tipo,
            'duracion' => $request->duracion,
        ]);

        $course->categories()->sync($request->categories);

        return redirect()->route('admin.courses.index')->with('alert', [
            'type' => 'success',
            'message' => 'El curso ha sido actualizado'
        ]);
    }
}
