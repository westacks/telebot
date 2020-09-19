<?php

namespace WeStacks\TeleBot\Laravel\Facades;

use Illuminate\Support\Facades\Facade;
use WeStacks\TeleBot\BotManager;

/**
 * Class Telegram.
 */
class TeleBot extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BotManager::class;
    }
}