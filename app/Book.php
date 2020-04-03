<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    public const IMAGE_PATH = 'public/books';

    protected $guarded = [];

    protected $casts = [
        'is_free' => 'boolean'
    ];

    //------------------- Relationships -------------------//
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //------------------- Mutators -------------------//
    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $image instanceof UploadedFile
            ? Storage::url($image->store(static::IMAGE_PATH))
            : $image;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = is_null($price) ? 0 : $price;
    }
}
