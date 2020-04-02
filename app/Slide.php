<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    public const IMAGE_PATH = 'public/slides';

    protected $guarded = [];

    //------------------- Mutators -------------------//
    public function setImageAttribute($image)
    {
        $this->attributes['image'] = $image instanceof UploadedFile
            ? Storage::url($image->store(static::IMAGE_PATH))
            : $image;
    }
}
