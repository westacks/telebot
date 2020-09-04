<?php

namespace WeStacks\TeleBot;

use Closure;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotObjectException;
use WeStacks\TeleBot\Objects\User;
use WeStacks\TeleBot\Objects\Message;
use WeStacks\TeleBot\Methods\GetMeMethod;
use WeStacks\TeleBot\Methods\SendMessageMethod;
use WeStacks\TeleBot\Methods\SendPhotoMethod;
use GuzzleHttp\Promise\PromiseInterface;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Methods\GetUpdatesMethod;
use WeStacks\TeleBot\Objects\Update;

/**
 * This class represents a bot instance. This is basicaly main controller for sending your Telegram requests.
 * 
 * @method User|PromiseInterface|False          getMe()                             A simple method for testing your bot's auth token. Requires no parameters. Returns basic information about the bot in form of a User object.
 * @method Message|PromiseInterface|False       sendMessage(array $parameters = [])      Use this method to send text messages. On success, the sent Message is returned.
 * @method Message|PromiseInterface|False       sendPhoto(array $parameters = [])        Use this method to send photos. On success, the sent Message is returned.
 * @method Update[]|PromiseInterface|False      getUpdates(array $parameters = [])       Use this method to send photos. On success, the sent Message is returned.
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
            'getUpdates'        => GetUpdatesMethod::class,
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
        if (is_string($config)) $config = ['token' => $config];
        if (!is_array($config)) $config = [];
        if (!isset($config['token'])) throw TeleBotObjectException::configKeyIsRequired('token', self::class);

        $this->properties['token']      = $config['token'];
        $this->properties['exceptions'] = $config['exceptions'] ?? true;
        $this->properties['async']      = $config['async'] ?? false;
        $this->properties['handlers']   = [];

        $this->addHandler($config['handlers'] ?? []);
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
        if (!isset($methods[$method])) throw TeleBotMehtodException::methodNotFound($method);

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
    public function async(bool $async = true)
    {
        $this->async = $async;
        return $this;
    }

    /**
     * Turn exceptions on for next method
     * @param bool $async 
     * @return self 
     */
    public function exceptions(bool $exceptions = true)
    {
        $this->exceptions = $exceptions;
        return $this;
    }

    /**
     * Add new update handler(s) to the bot instance
     * @param string|Closure|array $handler - string that representing `UpdateHandler` subclass resolution or closure function. You also may give an array to add multiple handlers.
     * @return void 
     * @throws TeleBotMehtodException 
     */
    public function addHandler($handler)
    {
        if (is_array($handler))
        {
            foreach ($handler as $sub)
                $this->addHandler($sub);
            return;
        }

        if (is_callable($handler) || is_string($handler) && class_exists($handler) && is_subclass_of($handler, UpdateHandler::class))
        {
            $this->properties['handlers'][] = $handler;
            return;
        }

        throw TeleBotMehtodException::wrongHandlerType(is_string($handler) ? $handler : gettype($handler));
    }

    /**
     * Handle given update
     * @param Update $update 
     * @return void 
     */
    public function handleUpdate(Update $update)
    {
        foreach ($this->properties['handlers'] as $handler)
        {
            if (is_callable($handler))
            {
                $handler($update);
                continue;
            }

            if ($handler::trigger($update))
                (new $handler($this, $update))->handle();
        }
    }
}