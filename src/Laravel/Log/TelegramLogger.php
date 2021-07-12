<?php

namespace WeStacks\TeleBot\Laravel\Log;

use Monolog\Logger;

class TelegramLogger
{
/**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        return new Logger(
            config('app.name'),
            [ new Handler($config) ]
        );
    }
}