<?php

namespace ubitcorp\Cities\Exceptions;
 
use InvalidArgumentException;

class HasOneCityException extends InvalidArgumentException
{
    public static function notBeAnArray()
    {
        return new static("This model should have only one city. Array given.");
    } 
}