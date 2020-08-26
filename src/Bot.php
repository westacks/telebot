<?php

namespace WeStacks\TeleBot;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\TelegramObject\User;
use WeStacks\TeleBot\TelegramObject\Message;
use WeStacks\TeleBot\TelegramMethod\GetMeMethod;
use WeStacks\TeleBot\TelegramMethod\SendMessageMethod;

/**
 * This class represents a bot instance. This is basicaly main controller for sending your Telegram requests.
 * 
 * @method User getMe(Closure $callback = null) A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method Message sendMessage(array $data, Closure $callback = null) Use this method to send text messages. On success, the sent Message is returned.
 * 
 * @package WeStacks\TeleBot
 */
class Bot
{
    /**
     * Array of bot properties
     * @var array
     */
    protected $properties;

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

        $method = new $methods[$method]($this->properties['token'], $arguments);

        return $method->execute();
    }

    /**
     * Map of registered bot methods
     * 
     * @return string[] 
     */
    private function methods()
    {
        return [
            'getMe'             => GetMeMethod::class,
            'sendMessage'       => SendMessageMethod::class,
        ];
    }
}