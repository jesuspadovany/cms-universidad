<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideRequest;
use App\Slide;

class SliderController extends Controller
{
    public function index()
    {
    	return view('admin.slider.index', [
            'slides', Slide::orderBy('position')->get()
        ]);
    }

    public function create()
    {
        return view('admin.slider.create', [
            'slides', Slide::orderBy('position')->get()
        ]);
    }

    public function store(StoreSlideRequest $storeSlideRequest)
    {
        $slide = Slide::create($storeSlideRequest->getSlideData());

        foreach ($storeSlideRequest->slides_positions as $slide) {
            Slide::where('id', $slide['id'])
                ->update(['position' => $slide['position']]);
        }

        return redirect()->route('admin.slider.index');
    }

    public function delete(Slide $slide)
    {
        // TODO: Eliminar la imagen

        $slide->delete();

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'La imagen ha sido eliminada'
        ]);
    }
}
