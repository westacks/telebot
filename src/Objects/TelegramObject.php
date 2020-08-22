<?php

namespace WeStacks\TeleBot\Objects;

abstract class TelegramObject
{
    private $properties;

    abstract protected function propertiesMap();

    public function __construct($object)
    {
        foreach ($this->propertiesMap() as $propName => $propType)
        {
            if(!isset($object[$propName])) continue;

            $this->properties[$propName] = $this->castedType($object[$propName], $propType);
        }
    }

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

    public function __get($key)
    {
        return $this->properties[$key] ?? null;
    }

    public function __set($key)
    {
        // We should not dot this...
    }
}