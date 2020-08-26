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
        // Cast array
        if(is_array($type))
        {
            if(is_array($value))
            {
                foreach ($value as $subKey => $subValue)
                    $value[$subKey] = static::cast($subValue, $type[0]);

                return $value;
            }
            throw TeleBotObjectException::uncastableType(gettype($type), gettype($value));
        }

        $value_type = gettype($value);
        $simple_types = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $complicate_types = ['array', 'object'];

        // Already casted
        if( $value_type == $type || $value_type == 'object' && class_exists($type) && ($value instanceof $type || is_subclass_of($value, $type))) return $value;

        // Cast simple type
        if(in_array($value_type, $simple_types) && in_array($type, $simple_types))
        {
            settype($value, $type);
            return $value;
        }

        // Cast object
        if(in_array($value_type, $complicate_types) && class_exists($type)) return $type::create($value);

        throw TeleBotObjectException::uncastableType($type, $value_type);
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
}