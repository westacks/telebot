<?php

namespace WeStacks\TeleBot\Contracts;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exceptions\TeleBotException;
use WeStacks\TeleBot\Helpers\Type;

abstract class TelegramMethod
{
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
    public function __construct(
        protected Client &$client,
        protected bool $exceptions,
        protected bool $async,
    ) {
    }

    public function __invoke($arguments = [])
    {
        $data = Type::flatten($arguments, $this->parameters);
        $data = empty($data) ? [] : ['multipart' => $data];

        $promise = $this->client->postAsync($this->method, $data)
            ->then(function (ResponseInterface $result) {
                $result = json_decode($result->getBody(), true);

                if (! $result['ok'] && $this->exceptions) {
                    throw TeleBotException::requestError($result);
                }

                return $result['ok'] ? Type::cast($result['result'], $this->expect) : false;
            });

        return $this->async ? $promise : $promise->wait();
    }
}
