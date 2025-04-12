<?php

namespace WeStacks\TeleBot\Exceptions;

use Throwable;
use WeStacks\TeleBot\Objects\ResponseParameters;

class TelegramApiException extends \Exception
{
    public readonly ?ResponseParameters $parameters;

    public function __construct(array $result, int $code = 0, ?Throwable $previous = null)
    {
        $this->parameters = isset($result['parameters']) ? ResponseParameters::from($result['parameters']) : null;

        parent::__construct($result['description'], $code, $previous);
    }
}
