<?php

namespace WeStacks\TeleBot\Foundation;

abstract class CallbackHandler extends UpdateHandler
{
    /**
     * String or regex to match callback data.
     */
    protected string $match;

    /**
     * Match update callback data for this handler.
     */
    protected function match(): bool
    {
        return $this->update->callback_query->data === $this->match ||
            preg_match($this->match, $this->update->callback_query->data);
    }

    public function trigger(): bool
    {
        if (! $this->update->type('callback_query')) {
            return false;
        }

        return $this->match();
    }

    /**
     * Returns array of matched callback arguments
     *
     * @return string[]|mixed
     */
    protected function arguments(?int $index = null, $default = null)
    {
        if (! @preg_match($this->match, $this->update->callback_query->data, $matches)) {
            return [];
        }

        if (! isset($matches)) {
            throw new \Exception('Unable to parse arguments!');
        }

        array_shift($matches);

        $matches = array_values($matches);

        return isset($index) ? ($matches[$index] ?? $default) : $matches;
    }
}
