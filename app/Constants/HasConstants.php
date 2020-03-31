<?php

namespace App\Constants;

use ReflectionClass;

trait HasConstants
{
    public static function getConstantsInArray()
    {
        $reflectionClass = new ReflectionClass(__CLASS__);

        $constants = $reflectionClass->getConstants();

        return array_values($constants);
    }
}
