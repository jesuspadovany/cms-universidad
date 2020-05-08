<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCard extends Model
{
    protected $guarded = [];

    protected $appends = [
        'full_short_text'
    ];

    //------------------- Relationships -------------------//
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    //------------------- Accessors -------------------//
    public function getFullShortTextAttribute()
    {
        $text = $this->book->published_at->format('Y') . ' / ' . $this->book->num_of_pages . ' páginas';

        return is_null($this->short_text)
            ? $text
            : $this->short_text . ' / ';
    }
}
