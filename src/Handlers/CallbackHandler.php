<?php

namespace WeStacks\TeleBot\Handlers;

abstract class CallbackHandler extends UpdateHandler
{
    protected string $match = '/.*/';
}
