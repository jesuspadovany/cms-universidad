<?php

namespace App\Http\Controllers;

use App\Book;
use App\Page;
use App\BookCard;
use App\Category;

class LibraryController extends Controller
{
    const INDEX_PAGINATION_NUM = 10;

    public function index()
    {
        $bookCards = BookCard::with('book')
            ->orderBy('id', 'desc')
            ->paginate(self::INDEX_PAGINATION_NUM);

        return $this->indexView($bookCards, 'Biblioteca');
    }

    public function indexByCategory(Category $category)
    {
        $sectionTitle = 'Biblioteca - ' . ucfirst($category->name);

        $bookCards = BookCard::with('book')
            ->whereHas('book.categories', function($query) use ($category) {
                $query->where('id', $category->id);
            })
            ->orderBy('id', 'desc')
            ->paginate(self::INDEX_PAGINATION_NUM);


        return $this->indexView($bookCards, $sectionTitle, true);
    }

    protected function indexView($bookCards, $sectionTitle, $filtered = false)
    {
        return view('library.index', [
            'bookCards' => $bookCards,
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
