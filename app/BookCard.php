<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCard extends Model
{
    protected $guarded = [];

    //------------------- Relationships -------------------//
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    //------------------- Accessors -------------------//
    public function getBookUrlAttribute()
    {
        return route('library.show', ['slug' => $this->book->slug, 'book' => $this->book->id]);
    }

    public function getBookTitleAttribute()
    {
        return $this->book->title;
    }

    public function getBookImageAttribute()
    {
        return $this->book->image;
    }

    public function getBookPriceAttribute()
    {
        return $this->book->price;
    }

    public function getBookIsFreeAttribute()
    {
        return $this->book->is_free;
    }

    //-------------------- Methods --------------------//
    public function getCardWithAccesors()
    {
        return $this->setAppends([
            'book_url',
            'book_title',
            'book_image',
            'book_price',
            'book_is_free',
        ])->toArray();
    }

    //-------------------- Static methods --------------------//
    public static function createFromBook(Book $book)
    {
        return static::create([
            'book_id' => $book->id,
            'short_text' => $book->published_at->format('Y') . ' / ' . $book->num_of_pages . ' páginas',
            'long_description' => $book->synopsis,
        ]);
    }
}
