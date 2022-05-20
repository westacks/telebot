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

        $state[static::class][$update->chat()->id][] = $update->user()->id;

        file_put_contents($statePath, json_encode($state));
    }

    public function trigger()
    {
        $statePath = __DIR__ . "/../../storage/" . $this->bot->config('token') . ".json";
        $this->state = file_exists($statePath) ? json_decode(file_get_contents($statePath), true) : [];

        return  $this->update->message()->text ?? false &&
                isset($this->state[static::class][$this->update->chat()->id]) &&
                in_array($this->update->user()->id, $this->state[static::class][$this->update->chat()->id]);
    }

    protected function answered()
    {
        $this->state[static::class][$this->update->chat()->id] = array_filter(
            $this->state[static::class][$this->update->chat()->id],
            fn ($id) => $id !== $this->update->user()->id
        );
        file_put_contents(__DIR__ . "/../../storage/" . $this->bot->config('token') . ".json", json_encode($this->state));
    }
}
