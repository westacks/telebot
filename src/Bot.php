<?php

namespace WeStacks\TeleBot;

use WeStacks\TeleBot\Exceptions\TeleBotMehtodException;
use WeStacks\TeleBot\Exceptions\TeleBotObjectException;
use WeStacks\TeleBot\Methods\GetMeMethod;

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

        $method = new $methods[$method]($arguments, $this->token);

        return $method->execute();
    }

    /**
     * Get bot property
     * 
     * @param string $key 
     * @return mixed 
     */
    public function __get($key)
    {
        return $this->properties[$key] ?? null;
    }

    /**
     * Map of registered bot methods
     * 
     * @return string[] 
     */
    private function methods()
    {
        return [
            GetMeMethod::name() => GetMeMethod::class
        ];
    }
}