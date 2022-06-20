<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * Abstract class for creating Telegram update handlers.
 */
abstract class AskInputHandler extends UpdateHandler
{
    private static function updateState(TeleBot $bot, callable $callback)
    {
        $statePath = __DIR__ . "/../../storage/" . $bot->config('token') . ".json";
        $state = file_exists($statePath) ? json_decode(file_get_contents($statePath), true) : [];

        $state = $callback($state);

        return !!file_put_contents($statePath, json_encode($state));
    }

    public static function requestInput(TeleBot $bot, string $user_id)
    {
        return static::updateState($bot, function ($state) use ($user_id) {
            $state[$user_id] = static::class;
            return $state;
        });
    }

    public function trigger()
    {
        $statePath = __DIR__ . "/../../storage/" . $this->bot->config('token') . ".json";
        $state = file_exists($statePath) ? json_decode(file_get_contents($statePath), true) : [];

        return  ($this->update->message()->text ?? false) &&
                static::class == ($state[$this->update->user()->id] ?? null);
    }

    protected function acceptInput()
    {
        return static::updateState($this->bot, function ($state) {
            unset($state[$this->update->user()->id]);
            return $state;
        });
    }

    public function __invoke($next)
    {
        return $this->trigger() ? $this->handle() : $next();
    }
}
