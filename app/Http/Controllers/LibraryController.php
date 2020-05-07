<?php

namespace App\Http\Controllers;

use App\Book;
use App\Page;
use App\Category;

class LibraryController extends Controller
{
    public function index()
    {
        return $this->indexView(Book::paginate(10), 'Biblioteca');
    }

    public function indexByCategory(Category $category)
    {
        $sectionTitle = 'Biblioteca - ' . ucfirst($category->name);

        return $this->indexView($category->books()->paginate(10), $sectionTitle, true);
    }

    protected function indexView($books, $sectionTitle, $filtered = false)
    {
        return view('library.index', [
            'books' => $books,
            'page' => Page::where('name', 'biblioteca')->first(),
            'categories' => Category::getLibraryCategories(),
            'sectionTitle' => $sectionTitle,
            'filtered' => $filtered
        ]);
    }

    public function show($slug, $id)
    {
        $book = Book::where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        return view('library.show', [
            'book' => $book
        ]);
    }
}
