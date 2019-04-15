<?php

namespace ubitcorp\Cities\Exceptions;
 
use InvalidArgumentException;

class HasOneDistirctException extends InvalidArgumentException
{
    public static function notBeAnArray()
    {
        return new static("This model should have only one district. Array given.");
    } 
}