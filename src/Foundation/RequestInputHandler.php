<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\Chat;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\TeleBot;

abstract class RequestInputHandler extends UpdateHandler
{
    /**
     * Use
     * {@see RequestInputHandler::trigger()},
     * {@see RequestInputHandler::request()},
     * {@see RequestInputHandler::accept()}
     * methods instead.
     *
     * @param TeleBot $bot
     * @return StorageContract
     * @internal
     */
    protected static function storage(TeleBot $bot): StorageContract
    {
        $storage = $bot->config['storage'] ?? FileStorage::class;

        return new $storage($bot);
    }

    public function trigger(): bool
    {
        return static::class == static::storage($this->bot)->get($this->update->user()->id);
    }

    /**
     * Can be used to set the request input handler for a specific user or chat.
     *
     * @param TeleBot $bot
     * @param User|Chat $target
     * @return bool
     */
    public static function request(TeleBot $bot, User|Chat $target): bool
    {
        return static::storage($bot)->set($target->id, static::class);
    }

    protected function accept(): bool
    {
        return static::storage($this->bot)->delete($this->update->user()->id);
    }

    public function __invoke(callable $next)
    {
        return $this->trigger() ? $this->handle() : $next();
    }
}
