<?php

namespace WeStacks\TeleBot;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\TelegramObject\User;
use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\TelegramMethod\GetMeMethod;

/**
 * This class represents a bot instance. This is basicaly main controller for sending your Telegram requests.
 * 
 * @method User|PromiseInterface getMe(Closure $callback = null) A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * 
 * @package WeStacks\TeleBot
 */
class TeleBot
{
    /**
     * Array of bot properties
     * @var array
     */
    protected $properties;

    /**
     * The
     * @var boolean|null
     */
    protected $async;

    /**
     * Create new instance of Telegram bot
     * 
     * @param mixed $config 
     * @return void 
     * @throws TeleBotObjectException 
     */
    public function __construct($config)
    {
        if(!isset($config['token'])) throw TeleBotObjectException::configKeyIsRequired('token', self::class);

        $this->properties['token']      = $config['token'];
        $this->properties['name']       = $config['name'] ?? null;
        $this->properties['webhook']    = $config['webhook'] ?? null;
        $this->properties['handlers']   = $config['handlers'] ?? [];
        $this->properties['async']      = $config['async'] ?? false;
    }

    /**
     * Execute next requst asynchronously (or synchronously if 'false' passed)
     * @param bool $is_async 
     * @return self 
     */
    public function async($is_async = true)
    {
        $this->async = $is_async;
        return $this;
    }

    /**
     * Call bot method
     * 
     * @param string $method 
     * @param mixed $arguments 
     * @return mixed 
     * @throws TeleBotMehtodException 
     */
    public function __call($method, $arguments)
    {
        $methods = $this->methods();
        if(!isset($methods[$method])) throw TeleBotMehtodException::methodNotFound($method);

        $async = $this->async ?? $this->properties['async'];
        $this->async = null;

        $method = new $methods[$method]($this->properties['token'], $arguments);

        return $method->execute($async);
    }

    /**
     * Map of registered bot methods
     * 
     * @return string[] 
     */
    private function methods()
    {
        return [
            'getMe' => GetMeMethod::class,
        ];
    }
}