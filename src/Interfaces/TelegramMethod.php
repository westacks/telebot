<?php

namespace WeStacks\TeleBot\Interfaces;

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
    }

    /**
     * Execute method
     * @param bool $exceptions Throws exceptions if true
     * @param bool $async Execute request asynchronously
     * @return mixed 
     */
    public function execute($exceptions = true, $async = false)
    {
        $config = $this->request();
        $client = new Client(['http_errors' => false]);

        $promise = $client->requestAsync($config['type'], $config['url'], $config['send'])
            ->then(function ($result) use ($config, $exceptions)
            {
                $result = json_decode($result->getBody());
                if ($result->ok) return TypeCaster::cast($result->result, $config['expect']);
                elseif ($exceptions) throw TeleBotRequestException::requestError($result);
                else return false;
            });

        return $async ? $promise : $promise->wait();
    }
}