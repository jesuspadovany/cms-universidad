<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    //--------------------- Relaciones ---------------------//
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public const IMAGE_PATH = 'public/cursos';
    public const DOC_PATH = 'public/cursos';
    protected $guarded = [];

    //------------------- Mutators -------------------//
    public function setImagenAttribute($imagen)     //IMPORTANTE TENER EL MISMO NOMBRE QUE EN BD
    {
        $this->attributes['imagen'] = $imagen instanceof UploadedFile  //IMPORTANTE TENER EL MISMO NOMBRE QUE EN BD
            ? Storage::url($imagen->store(static::IMAGE_PATH))
            : $imagen;
    }

    public function setMaterialAttribute($material)     //IMPORTANTE TENER EL MISMO NOMBRE QUE EN BD
    {
        $this->attributes['material'] = $material instanceof UploadedFile  //IMPORTANTE TENER EL MISMO NOMBRE QUE EN BD
            ? Storage::url($material->store(static::DOC_PATH))
            : $material;
    }
}
