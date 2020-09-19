<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
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
 * @method Update|False     handleUpdate(Update $update = null)             Handle given update
 * @method BotCommand[]     getLocalCommands()                              Get local bot instance commands registered by commands handlers
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

    public function __construct(array $config = null)
    {
        $bots = $config['bots'] ?? [];

        if (count($bots) < 1) {
            throw TeleBotObjectException::noBotsSpecified();
        }

        foreach ($bots as $bot => $botConfig) {
            $this->add($bot, $botConfig);
        }

        $this->default($config['default'] ?? array_keys($this->bots)[0]);
    }

    /**
     * Get bot by name
     * @param string $name bot name
     * @return TeleBot|null
     * @throws TeleBotObjectException 
     */
    public function bot(string $name = null)
    {
        $bot = $name ?? $this->default;
        
        if (is_null($bot)) {
            throw TeleBotObjectException::defaultBotIsNotSet();
        }

        if (!isset($this->bots[$bot])) {
            throw TeleBotObjectException::botNotFound($bot);
        }

        return $this->bots[$bot];
    }

    /**
     * Get array of bot names attached to BotManager instance
     * @return array 
     */
    public function bots()
    {
        return array_keys($this->bots);
    }

    /**
     * Add bot to BotManager
     * @param string $name bot name
     * @param TeleBot|string|array $bot TeleBot instance or bot config
     * @return TeleBot added bot
     */
    public function add(string $name, $bot)
    {
        if ($bot instanceof TeleBot) {
            $this->bots[$name] = $bot;
        }
        else {
            $this->bots[$name] = new TeleBot($bot);
        }
        return $this->bots[$name];
    }

    /**
     * Delete bot from BotManager
     * @param string $name bot name
     * @return void 
     */
    public function delete(string $name)
    {
        unset($this->bots[$name]);
        if ($this->default == $name) {
            $this->default = null;
        }
    }

    /**
     * Set default bot name
     * @param string $name bot name
     * @return TeleBot default bot 
     */
    public function default(string $name)
    {
        if (isset($this->bots[$name])) {
            $this->default = $name;
        }
        else {
            throw TeleBotObjectException::botNotFound($name);
        }
        return $this->bots[$name];
    }

    public function __call(string $name, array $arguments)
    {
        return $this->bot()->$name($arguments[0] ?? []);
    }
}