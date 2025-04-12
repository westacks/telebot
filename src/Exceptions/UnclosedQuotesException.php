<?php

namespace WeStacks\TeleBot\Exceptions;

use Throwable;

class UnclosedQuotesException extends \InvalidArgumentException
{
    public function __construct(
        public readonly string $quotes,
        public readonly int $position,
        ?string $message = null,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        if ($message === null) {
            $message = 'Still in quotes (' . $quotes  . ') from position ' . $position;
        }

        parent::__construct($message, $code, $previous);
    }
}
