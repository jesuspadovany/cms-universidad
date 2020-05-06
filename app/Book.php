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

    //------------------- Relationships -------------------//
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    //------------------- Mutators -------------------//
    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $image instanceof UploadedFile
            ? Storage::url($image->store(static::BOOKS_PATH))
            : $image;
    }

    //------------------- Accessors -------------------//
    public function getButtonTextAttribute()
    {
        return $this->attributes['is_free'] ? 'Descargar' : 'Comprar';
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

    //------------------- Static methdos -------------------//
    public static function getBooksInSlider()
    {
        return static::whereInSlider(true)->orderBy('position')->get();
    }
}
