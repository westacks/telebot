<?php

namespace WeStacks\TeleBot;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use WeStacks\TeleBot\Foundation\FileStorage;
use WeStacks\TeleBot\Foundation\HasTelegramMethods;
use WeStacks\TeleBot\Foundation\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;

/**
 * This class represents a bot instance.
 *
 * @see https://core.telegram.org/bots/api
 */
class TeleBot
{
    use HasTelegramMethods;

    /**
     * Bot configuration
     *
     * @var array{
     *     token: string,
     *     name: string|null,
     *     storage: class-string,
     *     api_url: string,
     *     http: array,
     *     kernel: class-string<Kernel>|Array<class-string<UpdateHandler>|callable>
     * }
     */
    public readonly array $config;

    protected Client $client;
    protected HandlerStack $stack;
    protected MockHandler $mockHandler;

    protected Kernel $kernel;

    public function __construct(array|string $config)
    {
        if (is_string($config)) {
            $config = ['token' => $config];
        }

        if (! isset($config['token'])) {
            throw new \InvalidArgumentException('Token is required');
        }

        $this->config = array_merge([
            'kernel' => Kernel::class,
            'storage' => FileStorage::class,
            'api_url' => 'https://api.telegram.org',
            'name' => null,
            'http' => [],
        ], $config);

        $this->client = new Client(array_merge($this->config['http'], [
            'http_errors' => false,
            'base_uri' => $this->config['api_url'] . "/bot" . $this->config['token'] . '/',
            'handler' => $this->stack = HandlerStack::create(),
        ]));

        $this->kernel = is_array($this->config['kernel'])
            ? new Kernel($this->config['kernel'])
            : new $this->config['kernel']();
    }

    public function __call(string $method, array $arguments): mixed
    {
        if (! class_exists($method = $this->method($method))) {
            throw new \BadMethodCallException("Method {$method} not found");
        }

        if (count($arguments) === 1 && isset($arguments[0]) && is_array($arguments[0])) {
            $arguments = $arguments[0];
        }

        $properties = array_merge($method::properties(), ['_rescue', '_promise']);

        foreach ($arguments as $key => $value) {
            if (is_int($key)) {
                $arguments[$properties[$key]] = $value;
                unset($arguments[$key]);
            }
        }

        if (array_key_exists('_rescue', $arguments)) {
            $rescue = array_pull($arguments, '_rescue');
            $rescue = static fn (\Throwable $e) => is_callable($rescue) ? $rescue($e) : $rescue;
        }

        $promise = array_pull($arguments, '_promise');

        /** @var \WeStacks\TeleBot\Foundation\TelegramMethod */
        $method = synthesize($arguments, $method);

        $result = $method($this->client, $rescue ?? null);

        return $promise ? $result : $result->wait();
    }

    /**
     * Fake the response of the bot. If you want to disable the mock, pass false as argument.
     *
     * @param array|false $responses The responses to be used by the mock handler.
     */
    public function fake(array|false $responses = []): void
    {
        if (isset($this->mockHandler)) {
            $this->stack->remove($this->mockHandler);
            unset($this->mockHandler);
        }

        if ($responses === false) {
            return;
        }

        $this->stack->setHandler($this->mockHandler = new MockHandler($responses));
    }

    /**
     * Handle an update with registered handlers.
     *
     * @param Update $update The incoming update.
     *
     * @return mixed The result of the last handler.
     */
    public function handle(Update $update): mixed
    {
        return $this->kernel->run($this, $update);
    }

    /**
     * Poll updates from Telegram.
     *
     * @param ?callable(TeleBot, Update): void $using
     * @param ?string[] $allowed_updates
     *
     * @return \Generator<int,Update>
     */
    public function poll(
        int $offset = 0,
        ?int $limit = null,
        ?int $timeout = null,
        ?array $allowed_updates = null
    ): \Generator {
        while (true) {
            $updates = $this->getUpdates($offset, $limit, $timeout, $allowed_updates);

            foreach ($updates as $update) {
                yield $update;

                $offset = $update->update_id + 1;
            }
        }
    }

    /**
     * Add a handler to the bot kernel.
     *
     * @param  callable|class-string<UpdateHandler>  $handler
     */
    public function handler(callable|string $handler): self
    {
        $this->kernel->add($handler);

        return $this;
    }

    /**
     * Set the commands for the bot.
     */
    public function setLocalCommands(): true
    {
        return $this->kernel->setCommands($this);
    }

    /**
     * Delete the commands for the bot.
     */
    public function deleteLocalCommands(): true
    {
        return $this->kernel->deleteCommands($this);
    }

    /**
     * Purge the bot kernel.
     */
    public function purge(): void
    {
        $this->kernel = new ($this->kernel::class);
    }

    /**
     * Get a configuration value.
     *
     * @param  string|null  $value
     * @param  mixed  $default
     * @return mixed
     */
    public function config(string|null $value = null, $default = null): mixed
    {
        if ($value === null) {
            return $this->config;
        }

        return $this->config[$value] ?? $default;
    }
}
