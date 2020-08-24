<?php

namespace WeStacks\TeleBot\Methods;

use Closure;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exceptions\TeleBotRequestException;
use WeStacks\TeleBot\Objects\ResponseParameters;
use WeStacks\TeleBot\Objects\TelegramObject;

abstract class Method
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
            unset($this->arguments[array_key_last($this->arguments)]);
        }
    }

    /**
     * Execute method
     * 
     * @param bool $async Execute async request
     * @return mixed 
     */
    public function execute($async = false)
    {
        $config = $this->request();
        $client = new Client();

        return $async ? $this->async($config, $client): 
                        $this->sync($config, $client);
    }

    private function sync($config, $client)
    {
        $response = $client->request($config['type'], $config['url'], $config['send']);

        $result = $this->handleResult()($response, $config['expect']);
        if(is_callable($config['callback'])) $config['callback']($result);
        return $result;
    }

    private function async($config, $client)
    {
        $resultHandler = $this->handleResult();

        return $client->requestAsync($config['type'], $config['url'], $config['send'])
            ->then(function (ResponseInterface $res) use ($config, $resultHandler) {

                $result = $resultHandler($res, $config['expect']);
                if(is_callable($config['callback'])) $config['callback']($result);
                return $result;
            });
    }

    private function handleResult()
    {
        return function (ResponseInterface $response, $expect)
        {
            $result = json_decode($response->getBody());

            if($result->ok) $result = TelegramObject::cast($result->result, $expect);
            else throw TelebotRequestException::unsuccessfulRequest(
                $result->description,
                $result->error_code,
                ResponseParameters::create($result->parameters ?? null)
            );

            return $result;
        };
    }
}