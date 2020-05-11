<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Page;
use App\BookCard;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateBookCardRequest;
use App\Http\Controllers\Traits\PassesOldInputToJs;
use App\Http\Requests\StoreBooksSliderOrderRequest;

class LibraryController extends Controller
{
    use PassesOldInputToJs;

    public function index()
    {
        return view("admin.library.index", [
            'books' => Book::orderBy('id', 'desc')->paginate(),
            'booksInSlider' => Book::getBooksInSlider()->map($this->loadCardWithAccesorsInBooks()),
            'page' => Page::where('name', 'biblioteca')->first()
        ]);
    }

    public function create()
    {
        return view('admin.library.create', [
            'categories' => Category::getLibraryCategories(),
            'oldData' => $this->getOldInputDataOrEmptyObject()
        ]);
    }

    public function store(StoreBookRequest $storeBookRequest)
    {
        $book = Book::create($storeBookRequest->getBookData());

        $book->categories()->attach($storeBookRequest->categories);

        BookCard::createFromBook($book);

        return redirect()->route('admin.library.show', $book)->with('alert', [
            'type' => 'success',
            'message' => 'El libro ha sido agregado'
        ]);
    }

    public function show(Book $book)
    {
        return view('admin.library.show', [
            'book' => $book,
            'card' => $book->card->getCardWithAccesors(),
        ]);
    }

    public function edit(Book $book)
    {
        $book->load('categories');

        return view('admin.library.edit', [
            'book' => $book,
            'categories' => Category::getLibraryCategories(),
            'oldData' => $this->getOldInputDataOrEmptyObject()
        ]);
    }

    public function update(UpdateBookRequest $updateBookRequest, Book $book)
    {
        $book->update($updateBookRequest->getBookData());

        $book->categories()->sync($updateBookRequest->categories);

        return redirect()->route('admin.library.show', $book)->with('alert', [
            'type' => 'success',
            'message' => 'El libro ha sido editado'
        ]);
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect()->route('admin.library.index')->with('alert', [
            'type' => 'success',
            'message' => 'El libro ha sido eliminado'
        ]);
    }

    public function slider()
    {
        return view('admin.library.slider', [
            'booksNotInSlider' => Book::with('card.book')->whereInSlider(false)->get()->map($this->loadCardWithAccesorsInBooks()),
            'booksInSlider' => Book::getBooksInSlider()->map($this->loadCardWithAccesorsInBooks()),
        ]);
    }

    protected function loadCardWithAccesorsInBooks()
    {
        return function(Book $book) {
            $book->cardWithAccessors = $book->card->getCardWithAccesors();

            return $book;
        };
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

    public function editCard(Book $book)
    {
        return view('admin.library.edit-card', [
            'book' => $book,
            'card' => $book->card->getCardWithAccesors(),
        ]);
    }

    public function updateCard(UpdateBookCardRequest $updateBookRequest, Book $book)
    {
        $book->card->update($updateBookRequest->validated());

        return redirect()->route('admin.library.show', $book)->with('alert', [
            'type' => 'success',
            'message' => 'La carta del libro ha sido actualizada',
        ]);
    }
}
