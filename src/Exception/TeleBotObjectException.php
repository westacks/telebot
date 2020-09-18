<?php

namespace WeStacks\TeleBot\Exception;

class TeleBotObjectException extends TeleBotException
{
    public static function inaccessibleVariable(string $key, string $class)
    {
        return new TeleBotObjectException("You are not able to write property \"$key\" to the \"$class\" object!", 403);
    }

    public static function inaccessibleUnsetVariable(string $key, string $class)
    {
        return new TeleBotObjectException("You are not able to unset the \"$key\" property of \"$class\" class", 403);
    }

    public static function undefinedOfset(string $key, string $source)
    {
        return new TeleBotObjectException("Trying to access an undefined offset \"$key\" on \"$source\"", 404);
    }

    public static function invalidDotNotation(string $value)
    {
        return new TeleBotObjectException("The given string \"$value\" is not representing dot notation", 400);
    }

    public static function uncastableType(string $type, string $objectType)
    {
        return new TeleBotObjectException("Unable to cast \"$objectType\" variable to type \"$type\".", 400);
    }

    public static function configKeyIsRequired(string $key, string $class)
    {
        return new TeleBotObjectException("Required key \"$key\" is not specified for \"$class\"");
    }
}
