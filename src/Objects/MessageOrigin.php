<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the origin of a message. It can be one of
 * - [MessageOriginUser](https://core.telegram.org/bots/api#messageoriginuser)
 * - [MessageOriginHiddenUser](https://core.telegram.org/bots/api#messageoriginhiddenuser)
 * - [MessageOriginChat](https://core.telegram.org/bots/api#messageoriginchat)
 * - [MessageOriginChannel](https://core.telegram.org/bots/api#messageoriginchannel)
 *
 * @see https://core.telegram.org/bots/api#messageorigin
 */
abstract class MessageOrigin extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'user' => MessageOriginUser::class,
            'hidden_user' => MessageOriginHiddenUser::class,
            'chat' => MessageOriginChat::class,
            'channel' => MessageOriginChannel::class,
            default => throw new \InvalidArgumentException("Unknown MessageOrigin: ".$parameters['type']),
        };
    }
}
