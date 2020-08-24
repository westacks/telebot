<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Exceptions\TeleBotException;

abstract class TelegramObject
{
    /**
     * Array of object properties
     * @var array
     */
    protected $properties;

    /**
     * This function should return a `$key => $value` representation of given object properties, where `$key` - is property name and `$value` - property type
     * @return array 
     */
    abstract protected function propertiesMap();

    public function __construct($object)
    {
        foreach ($this->propertiesMap() as $propName => $propType)
        {
            if(!isset($object[$propName])) continue;

            $this->properties[$propName] = $this->castedType($object[$propName], $propType);
        }
    }

    /**
     * Cast a `$value` to a given `$type`
     * 
     * @param mixed $value 
     * @param array|string $type 
     * @return mixed 
     */
    private function castedType($value, $type)
    {
        if(is_array($type) && is_array($value))
        {
            foreach ($value as $subKey => $subValue)
            {
                $value[$subKey] = $this->castedType($subValue, $type[0]);
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
     * @param String $property 
     * @return mixed
     */
    public function get($property)
    {
        $validate = "/(?:([a-z\_]+)(?:\[([0-9])\])?)/";
        $properties = explode('.', $property);
        $data = $this;
        
        foreach($properties as $prop)
        {
            if(preg_match($validate, $prop, $matches))
            {
                $key = $matches[1];
                if(!isset($data->$key)) throw TeleBotException::undefinedOfset($key, get_class($data) ?? gettype($data));
                $data = $data->$key;

                if(isset($matches[2])) {
                    $key = $matches[2];
                    if(!isset($data[$key])) throw TeleBotException::undefinedOfset($key, get_class($data) ?? gettype($data));
                    $data = $data[$key];
                }
            }
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