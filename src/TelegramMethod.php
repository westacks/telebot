<?php

namespace WeStacks\TeleBot;

use Closure;
use GuzzleHttp\Client;
use WeStacks\TeleBot\Exception\TeleBotException;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\Helpers\TypeCaster;

abstract class TelegramMethod
{
    /**
     * Method arguments
     * @var array
     */
    protected $arguments;

    /**
     * Bot API token
     * @var string
     */
    protected $token;

    /**
     * Method callback
     * @var Closure|null
     */
    protected $callback;

    /**
     * This function should return HTTP configuration for given method
     * @return array 
     */
    abstract protected function request();

    /**
     * Create new method instance
    */
    public function __construct(string $token, array $data = null)
    {
        $this->token = $token;
        $this->arguments = $data ?? [];

        $callback = end($this->arguments);
        if(is_callable($callback))
        {
            $this->callback = $callback;
            $key = array_key_last($this->arguments);
            unset($this->arguments[$key]);
        }
    }

    /**
     * Execute method
     * 
     * @param bool $exceptions Throws exceptions if true
     * @return mixed 
     */
    public function execute($exceptions = true)
    {
        try
        {
            $config = $this->request();
            $client = new Client(['http_errors' => false]);
    
            $result = $client->request($config['type'], $config['url'], $config['send']);
            $result = json_decode($result->getBody());
    
            if($result->ok) 
            {
                $result = TypeCaster::cast($result->result, $config['expect']);
            }
            else throw TeleBotRequestException::requestError($result);

            if(is_callable($config['callback'])) 
            {
                $config['callback']($result);
            }
            return $result;
        }
        catch (TeleBotException $exception)
        {
            if($exceptions) throw $exception;
            return false;
        }
    }
}