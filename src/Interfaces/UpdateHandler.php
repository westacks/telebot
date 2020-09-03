<?php

namespace WeStacks\TeleBot\Interfaces;

use WeStacks\TeleBot\Bot;
use WeStacks\TeleBot\Objects\Update;

/**
 * Abstract class for creating Telegram update handlers
 * @package WeStacks\TeleBot\Interfaces
 */
abstract class UpdateHandler
{
    /**
     * Update being processed
     * @var Update
     */
    protected $update;

    /**
     * Bot instance
     * @var Bot
     */
    protected $bot;

    /**
     * Create new update handler instance
     * @param Update $update 
     * @return void 
     */
    public function __construct(Bot $bot, Update $update)
    {
        $this->bot = $bot;
        $this->update = $update;
    }

    /**
     * This function should return `true` if this handler should handle given update, or `false` if should not
     * @param Update $update
     * @return boolean 
     */
    abstract public static function trigger(Update $update);

    /**
     * This function should handle updates
     * @return void 
     */
    abstract public function handle();
}