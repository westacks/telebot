<?php

namespace WeStacks\TeleBot\Foundation;

use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\TeleBot;

abstract class RequestInputHandler extends UpdateHandler
{
    private static function storage(TeleBot $bot): StorageContract
    {
        $storage = $bot->config['storage'] ?? FileStorage::class;

        return new $storage($bot);
    }

    public function trigger(): bool
    {
        return static::class == static::storage($this->bot)->get($this->update->user()->id);
    }

    public static function request(TeleBot $bot, User $user): bool
    {
        return static::storage($bot)->set($user->id, static::class);
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
