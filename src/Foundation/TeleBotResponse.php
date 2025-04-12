<?php

namespace WeStacks\TeleBot\Foundation;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use WeStacks\TeleBot\Exceptions\TelegramObjectException;

use function WeStacks\TeleBot\synthesize;

class TeleBotResponse extends Response implements ResponseInterface
{
    public static function make(mixed $data, null|array|string $type = null): static
    {
        if (is_string($data)) {
            $data = json_decode($data, true);
        }

        if ($type !== null && ! ($data instanceof $type)) {
            $type = is_array($type) ? $type : [$type];
            $error = null;

            foreach ($type as $_type) {
                try {
                    $data = synthesize($data, $_type);
                } catch (\Exception $e) {
                    $error = new TelegramObjectException('Unable to synthesize response result using type "'.$_type.'"', 0, $error ?? $e);

                    continue;
                }
            }

            if ($error) {
                throw new TelegramObjectException('Unable to synthesize Telegram response result', previous: $error);
            }
        }

        if ($data instanceof TelegramObject) {
            $data = $data->toArray();
        }

        return new static(body: json_encode(['ok' => true, 'result' => $data]), headers: [
            'Content-Type' => 'application/json',
        ]);
    }
}
