<?php

namespace WeStacks\TeleBot\Interfaces;

use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * Abstract class for creating Telegram update handlers.
 */
abstract class UpdateHandler
{
    /**
     * Update being processed.
     *
     * @var Update
     */
    protected $update;

    /**
     * Bot instance.
     *
     * @var TeleBot
     */
    protected $bot;

    /**
     * Create new update handler instance.
     */
    public function __construct(TeleBot $bot, Update $update)
    {
        $this->bot = $bot;
        $this->update = $update;
    }

    /**
     * This function should return `true` if this handler should handle given update, or `false` if should not.
     *
     * @return bool
     */
    abstract public static function trigger(Update $update);

    /**
     * This function should handle updates.
     */
    abstract public function handle();
}
