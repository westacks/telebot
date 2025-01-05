<?php

namespace WeStacks\TeleBot\Contracts;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;
use Traversable;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Helpers\Type;

/**
 * Basic Telegram object class. All Telegram api objects should extend this class.
 */
abstract class TelegramObject implements \Stringable, IteratorAggregate, JsonSerializable
{
    /**
     * Array of object properties.
     *
     * @var array
     */
    protected $properties;

    /**
     * Attributes type mapping.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Create new Telegram object instance.
     *
     * @param array|object $object
     */
    public function __construct($object)
    {
        if (! is_array($object) && ! is_object($object)) {
            throw new TeleBotException('Cannot cast value of type '.gettype($object).' to type '.static::class);
        }
        $this->properties = Type::cast($object, $this->attributes);
    }

    /**
     * Create new Telegram object instance.
     *
     * @param  array|object $object
     * @return static
     */
    public static function create($object)
    {
        return new static($object);
    }

    public function __get($key)
    {
        return $this->properties[$key];
    }

    public function __set($key, $value)
    {
        if (! isset($this->attributes[$key])) {
            throw new TeleBotException('Cannot set value of unknown property '.$key);
        }
        $this->properties[$key] = Type::cast($value, $this->attributes[$key]);
    }

    public function __isset($key)
    {
        return isset($this->properties[$key]);
    }

    public function __unset($key)
    {
        if (! isset($this->attributes[$key])) {
            throw new TeleBotException('Cannot set value of unknown property '.$key);
        }
        unset($this->properties[$key]);
    }

    public function __toString(): string
    {
        return (string) json_encode($this->toArray());
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function __debugInfo()
    {
        return $this->properties;
    }

    /**
     * Get associative array representation of this object.
     *
     * @return array
     */
    public function toArray()
    {
        return Type::strip($this->properties);
    }

    /**
     * Get associative array representation of this object.
     *
     * @return string
     */
    public function toJson()
    {
        return (string) $this;
    }

    /**
     * Get value(s) using dot notation.
     *
     * @param  array|string $key
     * @return mixed
     */
    public function get($key, mixed $default = null)
    {
        if (is_array($key)) {
            return $this->getMany($key);
        }

        return $this->_get($this->toArray(), $key, $default);
    }

    private function getMany($keys)
    {
        $data = [];

        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                [$key, $default] = [$default, null];
            }

            $data[$key] = $this->_get($this->items, $key, $default);
        }

        return $data;
    }

    private function value($value, ...$args)
    {
        return $value instanceof \Closure ? $value(...$args) : $value;
    }

    private function accessible($array)
    {
        return is_array($array) || $array instanceof \ArrayAccess;
    }

    private function _get($array, $key, $default = null)
    {
        if (! $this->accessible($array)) {
            return $this->value($array);
        }

        if (is_null($key)) {
            return $array;
        }

        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (! str_contains($key, '.')) {
            return $array[$key] ?? $this->value($default);
        }

        foreach (explode('.', $key) as $segment) {
            if ($this->accessible($array) && array_key_exists($segment, $array)) {
                $array = $array[$segment];
            } else {
                return $this->value($default);
            }
        }

        return $array;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->properties);
    }
}
