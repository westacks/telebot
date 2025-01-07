<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

/**
 * Bot manager for comfortable management of multiple TeleBot instances.
 *
 * @mixin \WeStacks\TeleBot\TeleBot Passes all calls to default bot.
 */
class BotManager
{
    use HasTelegramMethods;

    /**
     * Array of bot instances.
     *
     * @var array
     */
    protected $bots = [];

    /**
     * Default bot name.
     *
     * @var string|null
     */
    protected $default;

    public function __construct(?array $config = null)
    {
        $bots = $config['bots'] ?? [];

        if (count($bots) < 1) {
            throw new TeleBotException('No bots found in config.');
        }
        $this->bots = $bots;
        $this->default($config['default'] ?? $this->bots()[0]);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->bot()->{$name}(...($arguments ?? []));
    }

    /**
     * Get bot by name.
     *
     * @param  string|null $name bot name
     * @return TeleBot
     *
     * @throws TeleBotException
     */
    public function bot(?string $name = null)
    {
        $bot = $name ?? $this->default ?? null;

        if (is_null($bot)) {
            throw new TeleBotException('Default bot is not specified.');
        }

        if (! isset($this->bots[$bot])) {
            throw new TeleBotException("Bot '{$bot}' not found.");
        }

        if (! ($this->bots[$bot] instanceof TeleBot)) {
            $this->bots[$bot] = new TeleBot($this->bots[$bot]);
        }

        return $this->bots[$bot];
    }

    /**
     * Get array of bot names attached to BotManager instance.
     *
     * @return string[]
     */
    public function bots()
    {
        return array_keys($this->bots);
    }

    /**
     * Add bot to BotManager.
     *
     * @param  string               $name bot name
     * @param  array|string|TeleBot $bot  TeleBot instance or bot config
     * @return TeleBot              added bot
     */
    public function add(string $name, array|string|TeleBot $bot)
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
     * @param  string  $name bot name
     * @return TeleBot default bot
     */
    public function default(string $name)
    {
        if (isset($this->bots[$name])) {
            $this->default = $name;
        } else {
            throw new TeleBotException("Bot '{$name}' not found.");
        }

        return $this->bots[$name];
    }
}
