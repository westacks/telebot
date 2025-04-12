<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is based on a custom emoji.
 * @property-read string $type Type of the reaction, always “custom_emoji”
 * @property-read string $custom_emoji_id Custom emoji identifier
 *
 * @see https://core.telegram.org/bots/api#reactiontypecustomemoji
 */
class ReactionTypeCustomEmoji extends ReactionType
{
    public function __construct(
        public readonly string $type,
        public readonly string $custom_emoji_id,
    ) {
    }
}
