<?php

namespace App\Http\Controllers;

use App\Book;
use App\Slide;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home.index', [
            'slides' => Slide::orderBy('position')->get(),
            'booksInSlider' => Book::getBooksInSlider()
        ]);
    }

    public function institutional()
    {
        return view('home.institutional');
    }

    public function team()
    {
        return view('home.team');
    }

    public function media()
    {
        return view('home.media');
    }
}
