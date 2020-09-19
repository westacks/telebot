<?php

namespace WeStacks\TeleBot\Interfaces;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Helpers\TypeCaster;

/**
 * Basic Telegram object class. All Telegram api objects should extend this class
 *
 * @package WeStacks\TeleBot\Interfaces
 */
abstract class TelegramObject implements IteratorAggregate
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

    /**
     * Create new Telegram object instance
     *
     * @param array|object $object
     * @throws TeleBotObjectException
     */
    public function __construct($object)
    {
        $this->properties = TypeCaster::castValues($object, $this->relations());
    }

    /**
     * Create new Telegram object instance
     *
     * @param array|object $object
     * @throws TeleBotObjectException
     * @return TelegramObject
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
        return TypeCaster::stripArrays($this->properties);
    }

    /**
     * Get associative array representation of this object
     *
     * @return string
     */
    public function toJson()
    {
        return (string) $this;
    }

    /**
     * Seek through object properties using dot notation
     * Example: ```get('message.from.id')```
     *
     * @param string $property String in dot notation.
     * @param bool $exceprion If true, function will throm `TeleBotObjectException` if property is not found, else return null.
     *
     * @return mixed
     * @throws WeStacks\TeleBot\Exception\TeleBotObjectException
     */
    public function get(string $property, bool $exception = false)
    {
        $validate = "/(?:([^\s\.\[\]]+)(?:\[([0-9])\])?)/";
        $data = $this;
        
        try {
            if (preg_match_all($validate, $property, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    unset($match[0]);
                    foreach ($match as $key) {
                        $this->seek($data, $key);
                    }
                }
            } else {
                throw TeleBotObjectException::invalidDotNotation($property);
            }
        } catch (TeleBotObjectException $e) {
            if ($exception) {
                throw $e;
            }
            return null;
        }
        return $data;
    }

    /**
     * Try to dive `$data` into the `$key` property / array key.
     *
     * @param array|object $data
     * @param string $key
     * @return void
     */
    private function seek(&$data, string $key)
    {
        $seek = is_array($data) ? $data[$key] : $data->$key ?? null;
        if ($seek) {
            return $data = $seek;
        }
        throw TeleBotObjectException::undefinedOfset($key, get_class($data) ?? gettype($data));
    }

    /**
     * Recieve iterator
     * @return Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->properties);
    }

    public function __get($key)
    {
        return $this->properties[$key];
    }

    public function __set($key, $value)
    {
        throw TeleBotObjectException::inaccessibleVariable($key, self::class);
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
        return json_encode($this->toArray());
    }

    public function __debugInfo()
    {
        return $this->properties;
    }
}
