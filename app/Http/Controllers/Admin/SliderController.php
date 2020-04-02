<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlideRequest;
use App\Slide;

class SliderController extends Controller
{
    public function index()
    {
    	return view('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
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
}
