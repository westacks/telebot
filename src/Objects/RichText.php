<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a rich formatted text. Currently, it can be either a String for plain text, an Array of RichText, or any of the following types:
 *
 * @see https://core.telegram.org/bots/api#richtext
 */
class RichText extends TelegramObject
{
    /** @var string|RichText[] */
    public array|string $value;

    public function __construct(array|string $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        if (is_string($this->value)) {
            return $this->value;
        }

        return parent::__toString();
    }

    public function offsetExists(mixed $offset): bool
    {
        if (is_array($this->value)) {
            return array_key_exists($offset, $this->value);
        }

        return parent::offsetExists($offset);
    }

    public function offsetGet(mixed $offset): mixed
    {
        if (is_array($this->value)) {
            return $this->value[$offset];
        }

        return parent::offsetGet($offset);
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_array($this->value)) {
            $this->value[$offset] = $value;
            return;
        }

        parent::offsetSet($offset, $value);
    }

    public function offsetUnset(mixed $offset): void
    {
        if (is_array($this->value)) {
            unset($this->value[$offset]);
            return;
        }

        parent::offsetUnset($offset);
    }
}
