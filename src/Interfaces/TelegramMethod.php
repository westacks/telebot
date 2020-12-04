<?php

namespace WeStacks\TeleBot\Interfaces;

use GuzzleHttp\Client;
use WeStacks\TeleBot\Exception\TeleBotMehtodException;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\Traits\HasTelegramMethods;

abstract class TelegramMethod
{
    use HasTelegramMethods;

    /**
     * Method arguments.
     *
     * @var array
     */
    protected $arguments;

    /**
     * Bot API token.
     *
     * @var string
     */
    protected $token;

    /**
     * API URL
     * 
     * @var string
     */
    protected $api;

    /**
     * Create new method instance.
     */
    public function __construct(string $api, string $token, array $data = null)
    {
        $this->api = $api;
        $this->token = $token;
        $this->arguments = $data ?? [];
    }

    /**
     * Create new method instance.
     * 
     * @param string $method
     * @param string $api
     * @param string $token
     * @param array|null $data
     * 
     * @return TelegramMethod
     * 
     * @throws TeleBotMehtodException
     */
    public static function create(string $method, string $api, string $token, array $data = null)
    {
        if (!$Method = static::method($method)) {
            throw TeleBotMehtodException::methodNotFound($method);
        }

        return new $Method($api, $token, $data);
    }

    /**
     * Execute method.
     *
     * @param Client $client     Guzzle http client
     * @param bool   $exceptions Throws exceptions if true
     * @param bool   $async      Execute request asynchronously
     *
     * @return mixed
     */
    public function execute(Client &$client, $exceptions = true, $async = false)
    {
        $config = $this->request();

        $promise = $client->requestAsync($config['type'], $config['url'], $config['send'])
            ->then(function ($result) use ($config, $exceptions) {
                $result = json_decode($result->getBody());
                if ($result->ok) {
                    return TypeCaster::cast($result->result, $config['expect']);
                }
                if ($exceptions) {
                    throw TeleBotRequestException::requestError($result);
                }

                return false;
            })
        ;

        return $async ? $promise : $promise->wait();
    }

    /**
     * This function should return HTTP configuration for given method.
     *
     * @return array
     */
    abstract protected function request();
}
