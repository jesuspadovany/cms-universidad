<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        return view('admin.events.index');
    }

    public function slider()
    {
        return view('admin.events.slider');
    }

    public function create()
    {
        return view('admin.events.create');
    }
}
