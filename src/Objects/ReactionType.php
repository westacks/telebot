<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the type of a reaction. Currently, it can be one of
 * - [ReactionTypeEmoji](https://core.telegram.org/bots/api#reactiontypeemoji)
 * - [ReactionTypeCustomEmoji](https://core.telegram.org/bots/api#reactiontypecustomemoji)
 * - [ReactionTypePaid](https://core.telegram.org/bots/api#reactiontypepaid)
 *
 * @see https://core.telegram.org/bots/api#reactiontype
 */
abstract class ReactionType extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'emoji' => ReactionTypeEmoji::class,
            'custom_emoji' => ReactionTypeCustomEmoji::class,
            'paid' => ReactionTypePaid::class,
            default => throw new \InvalidArgumentException("Unknown ReactionType: ".$parameters['type']),
        };
    }
}
