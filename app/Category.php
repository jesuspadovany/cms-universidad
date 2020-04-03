<?php

namespace App;

use App\Constants\CategoryModules;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    //------------------- Scopeds -------------------//
    public function scopeWhereModuleIsLibrary($query)
    {
        return $query->where('module', CategoryModules::LIBRARY);
    }
}
