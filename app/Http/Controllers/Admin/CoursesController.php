<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePageImageRequest;
use App\Page;
use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    public function index()
    {
        return view('admin.courses.index', [
            'page' => Page::where('name', 'cursos')->first()
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
}
