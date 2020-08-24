<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exceptions\TeleBotException;

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
        foreach ($this->relations() as $propName => $propType)
        {
            if(!isset($object[$propName])) continue;
            $this->properties[$propName] = $this->cast($object[$propName], $propType);
        }
    }

    /**
     * Casts a `$value` to a given `$type`
     * 
     * @param mixed $value 
     * @param array|string $type 
     * @return mixed 
     */
    private function cast($value, $type)
    {
        if(is_array($type) && is_array($value))
        {
            foreach ($value as $subKey => $subValue)
            {
                $value[$subKey] = $this->cast($subValue, $type[0]);
            }
        }
        else if(is_string($type)) switch ($type)
        {
            case 'int':
            case 'integer':
            case 'bool':
            case 'boolean':
            case 'float':
            case 'double':
            case 'string':
                settype($value, $type);
                break;
            default:
                if(is_subclass_of($type, TelegramObject::class)) $value = new $type($value);
                break;
        }

        return $value;
    }

    /**
     * Seek through object properties using dot notation
     * Example: ```get('message.from.id')```
     * 
     * @param string $property String in dot notation.
     * @param bool $exceprion If true, function will throm `TeleBotException` if property is not found, else return null.
     * 
     * @return mixed
     * @throws WeStacks\TeleBot\Exceptions\TeleBotException
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
                        throw TeleBotException::undefinedOfset($key, get_class($data) ?? gettype($data));
                    
                    $data = $data->$key;
        
                    if(isset($match[2])) {
                        $key = $match[2];
                        if(!is_array($data)) 
                            throw TeleBotException::undefinedOfset("[".$key."]", get_class($data) ?? gettype($data));
                        
                        $data = $data[$key];
                    }
                }
            }
            else {
                throw TeleBotException::invalidDotNotation($property);
            }
        }
        catch (TeleBotException $e)
        {
            if($exceprion) throw $e;
            $data = null;
        }

        return $data;
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
        throw TeleBotException::inaccessibleVariable($key, $value, self::class);
    }

    public function __isset($key)
    {
        return isset($this->properties[$key]);
    }

    public function __unset($key)
    {
        throw TeleBotException::inaccessibleUnsetVariable($key, self::class);
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