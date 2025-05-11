<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Foundation\CommandHandler;
use WeStacks\TeleBot\Foundation\UpdateHandler;
use WeStacks\TeleBot\Objects\BotCommand;
use WeStacks\TeleBot\Objects\Update;

class Kernel
{
    /**
     * @param array<class-string<UpdateHandler>|callable> $handlers
     */
    public function __construct(
        protected array $handlers = []
    ) {
        foreach ($handlers as $index => $handler) {
            if (! $this->validate($handler)) {
                throw new \InvalidArgumentException('Invalid handler type at index ' . $index);
            }
        }
    }

    /**
     * @param  callable|class-string<UpdateHandler>  $handler
     */
    protected function validate(callable|string $handler): bool
    {
        if (is_callable($handler)) {
            return true;
        }

        return is_subclass_of($handler, UpdateHandler::class);
    }

    /**
     * Handles updates using registered handlers.
     *
     * @return mixed
     */
    public function run(TeleBot $bot, Update $update)
    {
        $runner = (function () use ($bot): \Generator {
            foreach ($this->handlers as $handler) {
                yield static fn (Update $update, callable $next) => is_subclass_of($handler, UpdateHandler::class) ?
                    (new $handler($bot, $update))($next) :
                    $handler($bot, $update, $next);
            }
        })();

        if (! $runner->valid()) {
            return;
        }

        $pipeline = static function () use (&$runner, $update, &$pipeline) {
            $runner->next();

            return $runner->valid() ?
                $runner->current()($update, $pipeline) :
                $runner->getReturn();
        };

        return $runner->current()($update, $pipeline);
    }

    public function setCommands(TeleBot $bot): true
    {
        return $bot->setMyCommands([
            'commands' => $this->getLocalCommands(),
        ]);
    }

    public function deleteCommands(TeleBot $bot): true
    {
        return $bot->deleteMyCommands();
    }

    /**
     * Get all registered localized commands.
     *
     * @return BotCommand[]
     */
    protected function getLocalCommands(?string $locale = null): array
    {
        /** @var array<class-string<CommandHandler>> */
        $commands = array_filter($this->handlers, static fn ($handler) => is_subclass_of($handler, CommandHandler::class));

        return array_values(array_merge(...array_map(
            static fn ($command) => $command::getBotCommand($locale),
            $commands,
        )));
    }

    /**
     * Add new update handler(s).
     *
     * @param  array|callable|class-string<UpdateHandler> $handler
     * @throws \InvalidArgumentException
     */
    public function add(array|callable|string ...$handlers): void
    {
        foreach ($handlers as $index => $handler) {
            if (is_array($handler)) {
                $this->add(...$handler);

                continue;
            }

            if (! $this->validate($handler)) {
                throw new \InvalidArgumentException('Invalid handler type at index ' . $index);
            }
        }

        $this->handlers = array_merge($this->handlers, $handlers);
    }
}
