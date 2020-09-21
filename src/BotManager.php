<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

/**
 * Bot manager for comfortable management of multiple TeleBot instances.
 *
 * @method TeleBot      async(bool $async = true)                       Call next method asynchronously (bot method will return guzzle promise)
 * @method TeleBot      exceptions(bool $exceptions = true)             Throw exceptions on next method (bot method will throw `TeleBotRequestException` on request error)
 * @method void         addHandler($handler)                            Add new update handler(s)                                                                          to the bot instance
 * @method void         clearHandlers()                                                                                                                                    Remove all update handlers from bot instance
 * @method false|Update handleUpdate(Update $update = null)                                                                                                                Handle given update
 * @method BotCommand[] getLocalCommands()                                                                                                                                 Get local bot instance commands registered by commands handlers
 */
class BotManager
{
    use HasTelegramMethods;

    /**
     * Array of bot instances.
     *
     * @var TeleBot[]
     */
    protected $bots = [];

    /**
     * Default bot name.
     *
     * @var string
     */
    protected $default;

    public function __construct(array $config = null)
    {
        $bots = $config['bots'] ?? [];

        if (count($bots) < 1) {
            throw TeleBotObjectException::noBotsSpecified();
        }
        $this->bots = $bots;
        $this->default($config['default'] ?? array_keys($this->bots)[0]);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->bot()->{$name}(...($arguments ?? []));
    }

    /**
     * Get bot by name.
     *
     * @param string $name bot name
     *
     * @throws TeleBotObjectException
     *
     * @return null|TeleBot
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

        if (!($this->bots[$bot] instanceof TeleBot)) {
            $this->bots[$bot] = new TeleBot($this->bots[$bot]);
        }

        return $this->bots[$bot];
    }

    /**
     * Get array of bot names attached to BotManager instance.
     *
     * @return array
     */
    public function bots()
    {
        return array_keys($this->bots);
    }

    /**
     * Add bot to BotManager.
     *
     * @param string               $name bot name
     * @param array|string|TeleBot $bot  TeleBot instance or bot config
     *
     * @return TeleBot added bot
     */
    public function add(string $name, $bot)
    {
        if ($bot instanceof TeleBot) {
            $this->bots[$name] = $bot;
        } else {
            $this->bots[$name] = new TeleBot($bot);
        }

        return $this->bots[$name];
    }

    /**
     * Delete bot from BotManager.
     *
     * @param string $name bot name
     */
    public function delete(string $name)
    {
        unset($this->bots[$name]);
        if ($this->default == $name) {
            $this->default = null;
        }
    }

    /**
     * Set default bot name.
     *
     * @param string $name bot name
     *
     * @return TeleBot default bot
     */
    public function default(string $name)
    {
        if (isset($this->bots[$name])) {
            $this->default = $name;
        } else {
            throw TeleBotObjectException::botNotFound($name);
        }

        return $this->bots[$name];
    }
}
