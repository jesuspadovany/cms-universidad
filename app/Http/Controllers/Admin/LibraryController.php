<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\StoreBooksSliderOrderRequest;

class LibraryController extends Controller
{
    public function index()
    {
        return view("admin.library.index", [
            'booksInSlider' => Book::getBooksInSlider()
        ]);
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

    public function slider()
    {
        return view('admin.library.slider', [
            'booksNotInSlider' => Book::whereInSlider(false)->get(),
            'booksInSlider' => Book::getBooksInSlider()
        ]);
    }

    public function storeBooksSliderOrder(StoreBooksSliderOrderRequest $storeBooksSliderOrderRequest)
    {
        Book::whereNotIn('id', request()->books)
            ->update(['in_slider' => false, 'position' => 0]);

        foreach ($storeBooksSliderOrderRequest->books as $book) {
            Book::where('id', $book['id'])
                ->update(['in_slider' => true, 'position' => $book['position']]);
        }

        return back();
    }
}
