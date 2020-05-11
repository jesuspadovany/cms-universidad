<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    public const IMAGE_PATH = 'public/cursos';
    public const DOC_PATH = 'public/cursos';

    protected $guarded = [];

    protected $appends = [
        'is_free',
    ];

    //--------------------- Relaciones ---------------------//
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function card()
    {
        return $this->hasOne(CourseCard::class);
    }

    //------------------- Mutators -------------------//
    public function setImagenAttribute($imagen)
    {
        $this->attributes['imagen'] = $imagen instanceof UploadedFile
            ? Storage::url($imagen->store(static::IMAGE_PATH))
            : $imagen;
    }

    public function setMaterialAttribute($material)
    {
        $this->attributes['material'] = $material instanceof UploadedFile
            ? Storage::url($material->store(static::DOC_PATH))
            : $material;
    }

    //------------------- Accessors -------------------//
    public function getNumOfClassesAttribute()
    {
        return 8;
    }

    public function getIsFreeAttribute()
    {
        return $this->price == 0;
    }

    public function getPriceTextAttribute()
    {
        return $this->is_free ? 'Gratis' : '$' . $this->price;
    }
}
