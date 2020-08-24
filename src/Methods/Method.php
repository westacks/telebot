<?php

namespace WeStacks\TeleBot\Methods;

use GuzzleHttp\Client;
use WeStacks\TeleBot\Objects\TelegramObject;

abstract class Method
{
    /**
     * Method arguments
     * @var array
     */
    protected $arguments;

    /**
     * Method URI
     * @var string
     */
    protected $url;

    /**
     * This function should return implemeted method name
     * @return string 
     */
    abstract public static function name();

    /**
     * This function should return HTTP configuration for given method
     * @return array 
     */
    abstract protected function request();

    /**
     * Create new method instance
    */
    public function __construct(array $data = null, $token)
    {
        if(is_null($data)) $data = [];
        $this->arguments = $data;

        $this->url = "https://api.telegram.org/bot{$token}/{$this->name()}";
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

        $res = $client->request($config['type'], $this->url, $this->arguments);
        $res = json_decode($res->getBody(), true);

        return TelegramObject::cast($res['result'], $config['expect']);
    }
}