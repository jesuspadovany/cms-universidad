<?php

namespace App;

use App\Constants\CategoryModules;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    //-------------------- Relationships --------------------//
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    //------------------- Scopes -------------------//
    public function scopeWhereModuleIsLibrary($query)
    {
        return $query->where('module', CategoryModules::LIBRARY);
    }

    //------------------- Static methods -------------------//
    public static function getLibraryCategories()
    {
        return static::whereModuleIsLibrary()->get();
    }
}
