<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Handlers\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;

class Kernel
{
    /**
     * Array of update handlers.
     *
     * @var string[]|callable[]
     */
    protected $handlers = [];

    public function __construct(array $handlers = [])
    {
        $this->add($handlers);
    }

    /**
     * Handles updates using registered handlers.
     *
     * @return mixed
     */
    public function run(TeleBot $bot, Update $update)
    {
        $runner = $this->runner($bot);

        if (! $runner->valid()) {
            return;
        }

        $start = $runner->current();
        $pipeline = function () use ($runner, $update, &$pipeline) {
            $runner->next();

            return $runner->valid() ?
                $runner->current()($update, $pipeline) :
                $runner->getReturn();
        };

        return $start($update, $pipeline);
    }

    public function setCommands(TeleBot &$bot)
    {
        return $bot->setMyCommands([
            'commands' => $this->getLocalCommands(),
        ]);
    }

    public function deleteCommands(TeleBot &$bot)
    {
        return $bot->deleteMyCommands();
    }

    protected function getLocalCommands()
    {
        return array_merge(...array_map(function ($command) {
            return $command::getBotCommand();
        }, array_filter($this->handlers, function ($handler) {
            return is_subclass_of($handler, CommandHandler::class);
        })));
    }

    private function runner(TeleBot $bot)
    {
        foreach ($this->handlers as $handler) {
            yield fn ($update, $next) => is_subclass_of($handler, UpdateHandler::class) ?
                (new $handler($bot, $update))($next) :
                $handler($bot, $update, $next);
        }

        return function () {};
    }

    /**
     * Add new update handler(s).
     *
     * @param array|\Closure|string $handler string that represents `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     *
     * @throws TeleBotException
     */
    public function add(array|\Closure|string $handler)
    {
        if (is_array($handler)) {
            foreach ($handler as $sub) {
                $this->add($sub);
            }

            return;
        }

        if (is_subclass_of($handler, UpdateHandler::class) || is_callable($handler)) {
            $this->handlers[] = $handler;

            return;
        }

        throw new TeleBotException('Invalid handler type.');
    }
}
