<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;

class LibraryController extends Controller
{
    public function index()
    {
        return view("admin.library.index");
    }

    public function create()
    {
        return view('admin.library.create', [
            'categories' => Category::whereModuleIsLibrary()->get()
        ]);
    }

    public function store(StoreBookRequest $storeBookRequest)
    {
        $book = Book::create($storeBookRequest->getBookData());

        $book->categories()->attach($storeBookRequest->categories);

        return redirect()->route('admin.library.index')->with('alert', [
            'type' => 'success',
            'message' => 'El libro ha sido agregado'
        ]);
    }
}
