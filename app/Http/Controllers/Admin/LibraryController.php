<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\StoreBooksSliderOrderRequest;
use App\Page;
use Illuminate\Support\Facades\Storage;

class LibraryController extends Controller
{
    public function index()
    {
        return view("admin.library.index", [
            'books' => Book::paginate(15),
            'booksInSlider' => Book::getBooksInSlider(),
            'page' => Page::where('name', 'biblioteca')->first()
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

    public function delete(Book $book)
    {
        $book->delete();

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'El libro ha sido eliminado'
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
        Book::whereNotIn('id', $storeBooksSliderOrderRequest->books)
            ->update(['in_slider' => false, 'position' => 0]);

        foreach ($storeBooksSliderOrderRequest->books as $book) {
            Book::where('id', $book['id'])
                ->update(['in_slider' => true, 'position' => $book['position']]);
        }

        return back()->with('alert', [
            'type' => 'success',
            'message' => 'El slider se guardo correctamente'
        ]);
    }

    public function changePageImage()
    {
        return view('admin.library.change-page-image');
    }

    public function storePageImage()
    {
        $data = request()->validate([
            'image' => ['required', 'image']
        ], [], [
            'image' => 'imagen'
        ]);

        $imagePath = Storage::url($data['image']->store('public/pages'));

        $page = Page::where('name', 'biblioteca')->first();

        $page->image = $imagePath;

        $page->save();

        return redirect()->route('admin.library.index')->with('alert', [
            'type' => 'success',
            'message' => 'La imagen ha sido actualizada'
        ]);
    }
}
