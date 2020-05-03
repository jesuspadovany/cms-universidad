<?php

namespace App\Http\Controllers;

use App\Book;
use App\Page;
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

    public function page(Page $page)
    {
        return view('home.page', [
            'page' => $page
        ]);
    }
}
