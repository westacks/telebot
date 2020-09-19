<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Traits\HasTelegramMethods;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Objects\BotCommand;

/**
 * Bot manager for comfortable management of multiple TeleBot instances
 * 
 * @method TeleBot          async(bool $async = true)                       Call next method asynchronously (bot method will return guzzle promise)
 * @method TeleBot          exceptions(bool $exceptions = true)             Throw exceptions on next method (bot method will throw `TeleBotRequestException` on request error)
 * @method void             addHandler($handler)                            Add new update handler(s) to the bot instance
 * @method void             clearHandlers()                                 Remove all update handlers from bot instance
 * @method boolean          handleUpdate(Update $update = null)             Handle given update
 * @method BotCommand[]     getInstaneCommands(Update $update = null)       Get local bot instance commands registered by commands handlers
 * 
 * @package WeStacks\TeleBot
 */
class BotManager
{
    use HasTelegramMethods;

    /**
     * Array of bot instances
     * @var TeleBot[]
     */
    protected $bots = [];

    /**
     * Default bot name
     * @var string
     */
    protected $default = null;

    public function __construct(array $config)
    {
        $this->default = $config['default'];

        foreach ($config['bots'] as $bot => $botConfig)
        {
            $this->addBot($bot, $botConfig);
        }
    }

    /**
     * Get bot by name
     * @param string $name 
     * @return TeleBot|null
     */
    public function bot(string $name = null)
    {
        return $this->bots[$name ?? $this->default] ?? null;
    }

    /**
     * Add bot to
     * @param string $name 
     * @param mixed $config 
     * @return void 
     */
    public function addBot(string $name, $config)
    {
        $this->bots[$name] = new TeleBot($config);
    }

    public function deleteBot(string $name)
    {
        unset($this->bots[$name]);
    }

    public function __call($name, $arguments)
    {
        return $this->bot()->$name($arguments[0] ?? []);
    }
}