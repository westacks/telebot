<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Contracts\StorageContract;
use WeStacks\TeleBot\Storage\JsonStorage;
use WeStacks\TeleBot\TeleBot;

/**
 * Abstract class for creating Telegram update handlers.
 */
abstract class RequestInputHandler extends UpdateHandler
{
    protected static function storage(TeleBot $bot): StorageContract
    {
        $storage = $bot->config('storage', JsonStorage::class);

        return new $storage($bot);
    }

    public static function requestInput(TeleBot $bot, string $user_id)
    {
        return static::storage($bot)->set($user_id, static::class);
    }

    public function trigger()
    {
        return ($this->update->message()->text ?? false) &&
                static::class == static::storage($this->bot)->get($this->update->user()->id);
    }

    protected function acceptInput()
    {
        return static::storage($this->bot)->delete($this->update->user()->id);
    }

    public function __invoke($next)
    {
        return $this->trigger() ? $this->handle() : $next();
    }
}
