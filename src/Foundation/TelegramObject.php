<?php

namespace WeStacks\TeleBot\Foundation;

use function WeStacks\TeleBot\synthesize;

abstract class TelegramObject implements \Stringable, \IteratorAggregate, \JsonSerializable
{
    public static function from(array|string $parameters): static
    {
        if (static::class === self::class) {
            throw new \RuntimeException('Cannot create object of abstract class '.static::class);
        }

        if (is_string($parameters)) {
            $parameters = json_decode($parameters, true);
        }

        return synthesize($parameters, static::class);
    }

    /**
     * Get the value of a given key.
     */
    public function get(string $key, $default = null): mixed
    {
        $segments = explode('.', $key);
        $data = $this;

        foreach ($segments as $segment) {
            if (is_array($data) && array_key_exists($segment, $data)) {
                $data = $data[$segment];
            } elseif (is_object($data) && isset($data->$segment)) {
                $data = $data->$segment;
            } else {
                return $default;
            }
        }

        return $data;
    }

    public function __debugInfo(): array
    {
        return $this->properties();
    }

    public function __toString(): string
    {
        return $this->toJson();
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toJson(): string
    {
        return (string) json_encode($this->toArray());
    }

    public function toArray(bool $recursive = true): array
    {
        if (! $recursive) {
            return $this->properties();
        }

        $match = static function ($value) use (&$match) {
            return match (true) {
                is_object($value) => $value->toArray(),
                is_array($value) => array_map($match, $value),
                default => $value
            };
        };

        return array_map($match, $this->properties());
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->properties());
    }

    private function properties(): array
    {
        return array_filter(get_object_vars($this), static fn ($value) => $value !== null);
    }
}
