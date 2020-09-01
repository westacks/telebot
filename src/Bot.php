<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\TelegramObject\User;
use WeStacks\TeleBot\TelegramObject\Message;
use WeStacks\TeleBot\TelegramMethod\GetMeMethod;
use WeStacks\TeleBot\TelegramMethod\SendMessageMethod;
use WeStacks\TeleBot\TelegramMethod\SendPhotoMethod;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * This class represents a bot instance. This is basicaly main controller for sending your Telegram requests.
 * 
 * @method User|PromiseInterface|False      getMe()                     A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method Message|PromiseInterface|False   sendMessage(array $data)    Use this method to send text messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False   sendPhoto(array $data)      Use this method to send photos. On success, the sent Message is returned.
 * 
 * @package WeStacks\TeleBot
 */
class Bot
{
    protected $properties = [];
    protected $async = null;
    protected $exceptions = null;

    protected function methods()
    {
        return [
            'getMe'             => GetMeMethod::class,
            'sendMessage'       => SendMessageMethod::class,
            'sendPhoto'         => SendPhotoMethod::class,
        ];
    }

    /**
     * Create new instance of Telegram bot
     * 
     * @param mixed $config 
     * @return void 
     * @throws TeleBotObjectException 
     */
    public function __construct($config)
    {
        if(is_string($config)) $config = ['token' => $config];
        if(!is_array($config)) $config = [];
        if(!isset($config['token'])) throw TeleBotObjectException::configKeyIsRequired('token', self::class);

        $this->properties['token']      = $config['token'];
        $this->properties['exceptions'] = $config['exceptions'] ?? true;
        $this->properties['async']      = $config['async'] ?? false;
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

        $exceptions = $this->exceptions ?? $this->properties['exceptions'];
        $async = $this->async ?? $this->properties['async'];

        $this->exceptions = null;
        $this->async = null;

        return $method->execute($exceptions, $async);
    }

    /**
     * Call next method asynchronously
     * @param bool $async 
     * @return self 
     */
    public function async($async = true)
    {
        $this->async = $async;
        return $this;
    }

    /**
     * Turn exceptions on for next method
     * @param bool $async 
     * @return self 
     */
    public function exceptions($exceptions = true)
    {
        $this->exceptions = $exceptions;
        return $this;
    }
}