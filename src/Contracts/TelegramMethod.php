<?php

namespace WeStacks\TeleBot\Contracts;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\Promise;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Helpers\Type;

abstract class TelegramMethod
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var bool
     */
    protected $exceptions;

    /**
     * @var bool
     */
    protected $async;

    /**
     * @var bool
     */
    protected $fake;
    /**
     * Method name.
     */
    protected string $method;

    /**
     * Method parameters and their types.
     */
    protected array $parameters;

    /**
     * Method expected return type.
     */
    protected string $expect;

    /**
     * Create new method instance.
     */
    public function __construct(Client &$client, bool $exceptions, bool $async, bool $fake)
    {
        $this->client = $client;
        $this->exceptions = $exceptions;
        $this->async = $async;
        $this->fake = $fake;
    }

    /**
     * Mock fake result for testing.
     */
    abstract protected function mock($arguments);

    public function __invoke($arguments = [])
    {
        if ($this->fake) {
            $promise = new Promise;
            $promise->resolve($this->mock(Type::cast($arguments, $this->parameters)));
        }

        else {
            $data = Type::flatten($arguments, $this->parameters);
            $data = empty($data) ? [] : ['multipart' => $data];

            $promise = $this->client->postAsync($this->method, $data)
                ->then(function (ResponseInterface $result) {
                    $result = json_decode($result->getBody()->getContents(), true);

                    if (! $result['ok'] && $this->exceptions) {
                        throw TeleBotException::requestError($result);
                    }

                    return $result['ok'] ? Type::cast($result['result'], $this->expect) : false;
                });
        }

        return $this->async ? $promise : $promise->wait();
    }
}
