<?php

namespace WeStacks\TeleBot\Handlers;

abstract class CallbackHandler extends UpdateHandler
{
    protected string $match;

    public function trigger(): bool
    {
        if (! isset($this->update->callback_query) || ! isset($this->update->callback_query->message)) {
            return false;
        }

        return $this->update->callback_query->data === $this->match ||
            preg_match($this->match, $this->update->callback_query->data);
    }

    protected function arguments(?int $index = null)
    {
        if (! @preg_match($this->match, $this->update->callback_query->data, $matches)) {
            return [];
        }

        if (! isset($matches)) {
            throw new \Exception('Unable to parse arguments!');
        }

        array_shift($matches);
        $matches = array_values($matches);

        if ($index) {
            return $matches[$index];
        }

        return $matches;
    }
}
