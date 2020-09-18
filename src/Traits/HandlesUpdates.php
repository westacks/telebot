<?php

namespace WeStacks\TeleBot\Traits;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

trait HandlesUpdates
{
    private $handlers = [];

    /**
     * Add new update handler(s) to the bot instance
     * @param string|Closure|array $handler - string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     * @return void
     * @throws TeleBotMehtodException
     */
    public function addHandler($handler)
    {
        if (is_array($handler)) {
            foreach ($handler as $sub) {
                $this->addHandler($sub);
            }
            return;
        }

        if (!$this->isUpdateHandler($handler)) {
            throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
        }

        $this->handlers[] = $handler;
    }

    /**
     * Remove all update handlers from bot instance
     * @return void
     */
    public function clearHandlers()
    {
        $this->handlers = [];
    }

    /**
     * Check if `$handler` is a valid update handler`
     * @param mixed $handler - update handler
     * @return bool
     */
    private function isUpdateHandler($handler)
    {
        return is_callable($handler) ||
            is_string($handler) && class_exists($handler) && is_subclass_of($handler, UpdateHandler::class);
    }

    /**
     * Handle given update
     * @param Update $update - Telegram update object. Leave empty to try to get it from incoming POST request (for handling webhook)
     * @return boolean
     */
    public function handleUpdate(Update $update = null)
    {
        if (!$this->validUpdate($update)) {
            return false;
        }

        foreach ($this->handlers as $handler) {
            if (is_callable($handler)) {
                $handler($update);
                continue;
            }

            if ($handler::trigger($update)) {
                (new $handler($this, $update))->handle();
            }
        }

        return true;
    }

    /**
     * Check if update is a valid telegram update
     * @param mixed $update - Telegram update object. Leave empty to try to get it from incoming POST request (for handling webhook)
     * @return bool
     */
    private function validUpdate(&$update = null)
    {
        if (is_null($update)) {
            $data = json_decode(file_get_contents('php://input'), true);
            if (is_null($data) || !isset($data['update_id'])) {
                return false;
            }
            $update = new Update($data);
        }
        return ($update instanceof Update);
    }

    /**
     * Get local bot instance commands registered by commands handlers
     * @return BotCommand[]
     */
    public function getInstaneCommands()
    {
        $commands = [];
        foreach ($this->handlers as $handler) {
            if (is_string($handler) && class_exists($handler) && is_subclass_of($handler, CommandHandler::class)) {
                $commands = array_merge($commands, $handler::getBotCommand());
            }
        }
        return $commands;
    }
}
