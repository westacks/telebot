<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Foundation\HasTelegramMethods;

/**
 * Bot manager for management of multiple TeleBot instances.
 *
 * @mixin \WeStacks\TeleBot\TeleBot Passes all calls to default bot.
 */
class BotManager
{
    use HasTelegramMethods;

    /**
     * @param TeleBot[] $bots
     */
    public function __construct(
        protected array $bots = [],
        protected string|int|null $default = null
    ) {
        foreach ($this->bots as $name => $bot) {
            if (! ($bot instanceof TeleBot)) {
                $this->bots[$name] = new TeleBot($bot);
            }
        }

        if ($default && ! isset($this->bots[$default])) {
            throw new \InvalidArgumentException("Unknown default bot: {$default}");
        }
    }

    public function __call(string $name, array $arguments): mixed
    {
        return $this->bot()->{$name}(...$arguments);
    }

    /**
     * Get bot by name or index.
     */
    public function bot(string|int|null $name = null): TeleBot
    {
        $bot = $name ?? $this->default ?? array_keys($this->bots)[0];

        return $this->bots[$bot];
    }

    /**
     * Get all bot names/indexes.
     *
     * @return array<string|int>
     */
    public function bots(): array
    {
        return array_keys($this->bots);
    }

    /**
     * Add a new bot to the manager.
     */
    public function add(string|int $name, array|string|TeleBot $bot): self
    {
        if (! ($bot instanceof TeleBot)) {
            $bot = new TeleBot($bot);
        }

        $this->bots[$name] = $bot;

        return $this;
    }

    /**
     * Remove a bot from the manager.
     */
    public function remove(string|int $name): self
    {
        unset($this->bots[$name]);

        if ($this->default === $name) {
            $this->default = null;
        }

        return $this;
    }

    public function default(string|int|null $name): self
    {
        if (! isset($this->bots[$name])) {
            throw new \InvalidArgumentException("Unknown bot: {$name}");
        }

        $this->default = $name;

        return $this;
    }
}
