<?php

namespace WeStacks\TeleBot\Helpers;

use WeStacks\TeleBot\Exception\TeleBotObjectException;

class TypeCaster
{
    private function __construct() {}

    /**
     * Casts each `$object` key to a given type in `$relations` array with a same key.
     * 
     * @param array|object $object
     * @param array $relations 
     * @return array 
     */
    public static function castValues($object, array $relations)
    {
        $result = [];

        foreach ( $object as $prop => $value ) if( isset($relations[$prop]) )
        {
            $result[$prop] = static::cast($value, $relations[$prop]);
        }

        return $result;
    }

    /**
     * Casts a `$value` to a given `$type`
     * 
     * @param mixed $value 
     * @param array|string $type 
     * @return mixed 
     */
    public static function cast($value, $type)
    {
        if(is_array($type)) 
        return static::castArrayOfTypes($value, $type);

        if(static::isCasted($value, $type))
            return $value;

        return static::castDirect($value, $type);
    }

    /**
     * Cast all sub objects to arrays
     * 
     * @param array|object $object 
     * @param array $relations 
     * @return array
     */
    public static function stripArrays($object)
    {
        $array = [];

        foreach ($object as $key => $value)
        {
            if(is_object($value) || is_array($value)) $value = static::stripArrays($value);
            $array[$key] = $value;
        }

        return $array;
    }

    private static function castArrayOfTypes($object, array $type)
    {
        if(!is_array($object)) throw TeleBotObjectException::uncastableType(gettype($type), gettype($object));

        foreach ($object as $subKey => $subValue)
            $object[$subKey] = static::cast($subValue, $type[0]);

        return $object;
    }

    private static function isCasted($object, string $type)
    {
        $value_type = gettype($object);

        return  $value_type == $type || 
                $value_type == 'object' && class_exists($type) &&
                ($object instanceof $type || is_subclass_of($object, $type));
    }

    private static function castDirect($object, string $type)
    {
        $simple = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $value_type = gettype($object);

        if(in_array($value_type, $simple) && in_array($type, $simple))
        {
            settype($value, $type);
            return $value;
        }

        if(class_exists($type)) return $type::create($object);

        throw TeleBotObjectException::uncastableType($type, $value_type);
    }
}