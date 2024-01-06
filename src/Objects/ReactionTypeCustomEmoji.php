<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is based on a custom emoji.
 *
 * @property string $type   Type of the reaction, always “custom_emoji”
 * @property string $emoji  Custom emoji identifier
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    protected $attributes = [
        'type' => 'string',
        'custom_emoji_id' => 'string',
    ];
}
