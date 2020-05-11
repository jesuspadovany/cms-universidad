<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    public const BOOKS_PATH = 'public/books';

    protected $guarded = [];

    protected $casts = [
        'is_free' => 'boolean',
        'is_in_slider' => 'boolean'
    ];

    protected $dates = [
        'published_at'
    ];

    //------------------- Relationships -------------------//
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function card()
    {
        return $this->hasOne(BookCard::class);
    }

    //------------------- Mutators -------------------//
    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $image instanceof UploadedFile
            ? Storage::url($image->store(static::BOOKS_PATH))
            : $image;
    }

    public function setFileAttribute($file)
    {
        $this->attributes['file'] = $file instanceof UploadedFile
            ? Storage::url($file->store(static::BOOKS_PATH))
            : $file;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = is_null($price) ? 0 : $price;
    }

    //------------------- Accessors -------------------//
    public function getButtonTextAttribute()
    {
        return $this->attributes['is_free'] ? 'Descargar' : 'Comprar';
    }

    public function getPriceTextAttribute()
    {
        return $this->attributes['is_free'] ? 'Gratis' : '$' . $this->price;
    }

    public function getCardWithAccessorsAttribute()
    {
        return $this->card->getCardWithAccesors();
    }

    //------------------- Static methdos -------------------//
    public static function getBooksInSlider()
    {
        return static::whereInSlider(true)->orderBy('position')->get();
    }
}
