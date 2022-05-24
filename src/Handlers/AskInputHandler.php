<?php

namespace WeStacks\TeleBot\Handlers;

use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * Abstract class for creating Telegram update handlers.
 */
abstract class AskInputHandler extends UpdateHandler
{
    /**
     * Current handler state.
     * @var array
     */
    protected $state;

    public static function requestInput(TeleBot $bot, Update $update)
    {
        $statePath = __DIR__ . "/../../storage/" . $bot->config('token') . ".json";
        $state = file_exists($statePath) ? json_decode(file_get_contents($statePath), true) : [];

        $state[$update->user()->id] = static::class;

        return !!file_put_contents($statePath, json_encode($state));
    }

    public function trigger()
    {
        $statePath = __DIR__ . "/../../storage/" . $this->bot->config('token') . ".json";
        $this->state = file_exists($statePath) ? json_decode(file_get_contents($statePath), true) : [];

        return  ($this->update->message()->text ?? false) &&
                static::class == ($this->state[$this->update->user()->id] ?? null);
    }

    protected function answered()
    {
        $statePath = __DIR__ . "/../../storage/" . $this->bot->config('token') . ".json";
        unset($this->state[$this->update->user()->id]);
        return !!file_put_contents($statePath, json_encode($this->state));
    }

    public function __invoke($next)
    {
        return $this->trigger() ? $this->handle() : $next();
    }
}
