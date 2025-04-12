<?php

namespace WeStacks\TeleBot\Foundation;

use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exceptions\TelegramApiException;
use WeStacks\TeleBot\Exceptions\TelegramObjectException;

use function WeStacks\TeleBot\get_public_object_vars;
use function WeStacks\TeleBot\multipart;
use function WeStacks\TeleBot\synthesize;

abstract class TelegramMethod
{
    protected string $method;

    protected array $expect;

    public function __invoke(Client &$client, ?callable $rescue = null): PromiseInterface
    {
        return $client->postAsync($this->method, $this->arguments())
            ->then(function (ResponseInterface $response) use ($rescue) {
                $result = json_decode($response->getBody()->getContents(), true);

                if (! $result['ok']) {
                    $error = new TelegramApiException($result, $result['error_code'] ?? 0);

                    return $rescue ? $rescue($error) : throw $error;
                }

                $error = null;

                foreach ($this->expect as $type) {
                    try {
                        return synthesize($result['result'], $type);
                    } catch (\Exception $e) {
                        $error = new TelegramObjectException('Unable to synthesize response result using type "'.$type.'"', 0, $error ?? $e);

                        continue;
                    }
                }

                throw new TelegramObjectException('Unable to synthesize Telegram response result', previous: $error);
            });
    }

    /**
     * @internal
     * @return string[]
     */
    public static function properties(): array
    {
        $properties = (new \ReflectionClass(static::class))->getProperties(\ReflectionProperty::IS_PUBLIC);

        return array_map(static fn (\ReflectionProperty $property) => $property->getName(), $properties);
    }

    private function arguments(): array
    {
        $arguments = array_filter(get_public_object_vars($this), static fn ($value) => $value !== null);

        return empty($arguments) ? [] : ['multipart' => multipart($arguments)];
    }
}
