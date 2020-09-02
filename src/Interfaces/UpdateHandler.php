<?php

namespace WeStacks\TeleBot\Interfaces;

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
     * Create new update handler instance
     * @param Update $update 
     * @return void 
     */
    public function __construct(Update $update)
    {
        $this->update = $update;
    }

    /**
     * This function should return `true` if this handler should handle given update
     * @return mixed 
     */
    abstract public static function trigger(Update $update);

    /**
     * This function should handle updates
     * @return mixed 
     */
    abstract public function handle();
}