<?php

namespace WeStacks\TeleBot\Objects;

use Exception;
use WeStacks\TeleBot\Exceptions\TeleBotObjectException;

/**
 * Basic Telegram object class. All Telegram api objects should extend this class
 * 
 * @package WeStacks\TeleBot\Objects
 */
abstract class TelegramObject
{
    /**
     * Array of object properties
     * @var array
     */
    protected $properties;

    /**
     * This function should return an array representation of given object properties, where `$key` - is property name and `$value` - property type
     * @return array 
     */
    abstract protected function relations();

    public function __construct($object)
    {
        if($object && $relations = $this->relations())
            foreach ($object as $prop => $value)
                if(isset($relations[$prop])) $this->properties[$prop] = $this->cast($value, $relations[$prop]);
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
            throw TeleBotObjectException::uncastableType(str_replace(" [0] => ","",print_r($type, true)), gettype($value));
        }

        $value_type = gettype($value);
        $simple_types = ['int', 'integer', 'bool', 'boolean', 'float', 'double', 'string'];
        $complicate_types = ['array', 'object'];

        // Already casted
        if($value_type == $type || $value_type == 'object' && class_exists($type) && $value instanceof $type) return $value;

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
     * Seek through object properties using dot notation
     * Example: ```get('message.from.id')```
     * 
     * @param string $property String in dot notation.
     * @param bool $exceprion If true, function will throm `TeleBotObjectException` if property is not found, else return null.
     * 
     * @return mixed
     * @throws WeStacks\TeleBot\Exceptions\TeleBotObjectException
     */
    public function get(string $property, bool $exceprion = false)
    {
        $validate = "/(?:([^\s\.\[\]]+)(?:\[([0-9])\])?)/";
        $data = $this;
        
        try {
            if(preg_match_all($validate, $property, $matches, PREG_SET_ORDER))
            {
                foreach($matches as $match)
                {
                    $key = $match[1];
                    if(!isset($data->$key)) 
                        throw TeleBotObjectException::undefinedOfset($key, get_class($data) ?? gettype($data));
                    
                    $data = $data->$key;
        
                    if(isset($match[2])) {
                        $key = $match[2];
                        if(!is_array($data) || !isset($data[$key]))
                            throw TeleBotObjectException::undefinedOfset("[".$key."]", get_class($data) ?? gettype($data));
                        
                        $data = $data[$key];
                    }
                }
            }
            else {
                throw TeleBotObjectException::invalidDotNotation($property);
            }
        }
        catch (TeleBotObjectException $e)
        {
            if($exceprion) throw $e;
            $data = null;
        }

        return $data;
    }

    /**
     * Create new object instance
     * 
     * @param mixed $object 
     * @return static 
     */
    public static function create($object)
    {
        return new static($object);
    } 

    /**
     * Get associative array representation of this object
     * 
     * @return array 
     */
    public function toArray()
    {
        return json_decode($this, true);
    }

    /**
     * Get JSON representation of this object
     * 
     * @return string 
     */
    public function toJson()
    {
        return (string) $this;
    }

    public function __get($key)
    {
        return $this->properties[$key];
    }

    public function __set($key, $value)
    {
        throw TeleBotObjectException::inaccessibleVariable($key, $value, self::class);
    }

    public function __isset($key)
    {
        return isset($this->properties[$key]);
    }

    public function __unset($key)
    {
        throw TeleBotObjectException::inaccessibleUnsetVariable($key, self::class);
    }

    public function __toString()
    {
        return json_encode($this->properties);
    }

    public function __debugInfo()
    {
        return $this->properties;
    }
}