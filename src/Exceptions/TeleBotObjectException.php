<?php

namespace WeStacks\TeleBot\Exceptions;

use Exception;

class TeleBotObjectException extends Exception
{
    public static function inaccessibleVariable(string $key, $value, string $class)
    {
        return new static("You are not able to write property \"$key\" to the \"$class\" class. Given value: \"" . print_r($value, true)."\"", 403);
    }

    public static function inaccessibleUnsetVariable(string $key, string $class)
    {
        return new static("You are not able to unset the \"$key\" property of \"$class\" class", 403);
    }

    public static function undefinedOfset(string $key, string $source)
    {
        return new static("Trying to access an undefined offset \"$key\" on \"$source\"", 404);
    }

    public static function invalidDotNotation(string $value)
    {
        return new static("The given string \"$value\" is not representing dot notation", 400);
    }

    public static function uncastableType(string $type, string $objectType)
    {
        return new static("Unable to cast variable to type \"$type\". \"$objectType\" given", 400);
    }

    public static function configKeyIsRequired(string $key, string $class)
    {
        return new static("Required config key \"$key\" is not specified for class \"$class\"");
    }
}