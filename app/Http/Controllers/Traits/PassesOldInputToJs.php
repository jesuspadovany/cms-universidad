<?php

namespace App\Http\Controllers\Traits;

use StdClass;

trait PassesOldInputToJs
{
    protected function getOldInputDataOrEmptyObject()
    {
        return empty(request()->old()) ? new StdClass : request()->old();
    }
}
