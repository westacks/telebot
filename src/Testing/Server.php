<?php

namespace WeStacks\TeleBot\Testing;

use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;

class Server
{
    protected int $updateId = 1;

    protected int $messageId = 1;

    protected int $callbackQueryId = 1;

    public function __construct(
        protected string $baseUrl,
    ) {
    }

    public function __invoke(RequestInterface $request, array $options): PromiseInterface
    {
        $request->getUri();
    }
}
