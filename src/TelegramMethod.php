<?php

namespace WeStacks\TeleBot;

use Closure;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exception\TeleBotRequestException;
use WeStacks\TeleBot\Helpers\TypeCaster;
use WeStacks\TeleBot\TelegramObject\ResponseParameters;

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
     * @param bool $async Execute async request
     * @return mixed 
     */
    public function execute()
    {
        $config = $this->request();
        $client = new Client();

        $promise = $client->requestAsync($config['type'], $config['url'], $config['send'])
            ->then(function (ResponseInterface $res) use ($config)
                {
                    $result = json_decode($res->getBody());
                    if($result->ok) 
                    {
                        $result = TypeCaster::cast($result->result, $config['expect']);
                    }
                    else throw TelebotRequestException::unsuccessfulRequest(
                        $result->description, $result->error_code, ResponseParameters::create($result->parameters ?? null)
                    );

                    if(is_callable($config['callback'])) 
                    {
                        $config['callback']($result);
                    }
                    return $result;
                }
            );

        return $promise->wait();
    }
}