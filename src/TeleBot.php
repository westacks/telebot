<?php

namespace WeStacks\TeleBot;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Spatie\GuzzleRateLimiterMiddleware\RateLimiterMiddleware;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Traits\HandlesUpdates;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

/**
 * This class represents a bot instance. This is basicaly main controller for sending and handling your Telegram requests.
 * @package WeStacks\TeleBot
 */
class TeleBot
{
    use HandlesUpdates, HasTelegramMethods;

    /**
     * Bot config
     * @var mixed
     */
    protected $config = [];
    
    /**
     * Guzzle HTTP client
     * @var Client
     */
    protected $client;

    /**
     * Async trigger
     * @var bool
     */
    protected $async = null;

    /**
     * Exception trigger
     * @var bool
     */
    protected $exceptions = null;

    /**
     * Call next method asynchronously (bot method will return guzzle promise)
     * @param bool $async
     * @return self
     */
    public function async(bool $async = true)
    {
        $this->async = $async;
        return $this;
    }

    /**
     * Throw exceptions on next method (bot method will throw `TeleBotRequestException` on request error)
     * @param bool $async
     * @return self
     */
    public function exceptions(bool $exceptions = true)
    {
        $this->exceptions = $exceptions;
        return $this;
    }

    /**
     * Create new instance of Telegram bot
     *
     * @param string|array $config Bot config. Path telegram bot API token as string, or array of parameters
     * @return void
     * @throws TeleBotObjectException
     */
    public function __construct($config)
    {
        if (is_string($config)) {
            $config = ['token' => $config];
        }
        if (!is_array($config)) {
            $config = [];
        }
        if (!isset($config['token'])) {
            throw TeleBotObjectException::configKeyIsRequired('token', self::class);
        }

        $this->addHandler($config['handlers'] ?? []);

        $this->config = [
            'token'         => $config['token'],
            'exceptions'    => $config['exceptions'] ?? true,
            'async'         => $config['async'] ?? false,
            'rate_limit'    => $config['rate_limit'] ?? 1
        ];

        $stack = HandlerStack::create()
            ->push(RateLimiterMiddleware::perSecond($this->config['rate_limit']));

        $this->client = new Client(['http_errors' => false, 'handler' => $stack]);
    }

    public function __call(string $method, array $arguments)
    {
        $methods = $this->methods();
        if (!isset($methods[$method])) {
            throw TeleBotMehtodException::methodNotFound($method);
        }

        $method = new $methods[$method]($this->config['token'], $arguments);
        $exceptions = $this->exceptions ?? $this->config['exceptions'];
        $async = $this->async ?? $this->config['async'];

        $this->exceptions = null;
        $this->async = null;
        return $method->execute($this->client, $exceptions, $async);
    }
}
