<?php

namespace WeStacks\TeleBot\Traits;

use WeStacks\TeleBot\Kernel;
use WeStacks\TeleBot\Objects\Update;

trait HandlesUpdates
{
    /**
     * Kernel for handling incoming updates.
     *
     * @var Kernel
     */
    protected $kernel;

    /**
     * Handle given update.
     *
     * @param  Update $update Telegram update object
     * @return mixed
     */
    public function handleUpdate(Update $update)
    {
        return $this->kernel->run($this, $update);
    }

    /**
     * Sets registered locally bot commands on Telegram API.
     *
     * @return mixed
     */
    public function setLocalCommands()
    {
        return $this->kernel->setCommands($this);
    }

    /**
     * Deletes registered locally bot commands from Telegram API.
     *
     * @return mixed
     */
    public function deleteLocalCommands()
    {
        return $this->kernel->deleteCommands($this);
    }

    /**
     * Add new update handler(s) to the bot instance.
     *
     * @param array|\Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     */
    public function addHandler(array|\Closure|string $handler)
    {
        $this->kernel->add($handler);
    }

    /**
     * Remove all update handlers from bot instance.
     */
    public function clearHandlers()
    {
        $Kernel = $this->kernel::class;
        $this->kernel = new $Kernel();
    }
}
