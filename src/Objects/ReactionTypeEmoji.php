<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The reaction is based on an emoji.
 * @property-read string $type Type of the reaction, always “emoji”
 * @property-read string $emoji Reaction emoji. Currently, it can be one of "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""
 *
 * @see https://core.telegram.org/bots/api#reactiontypeemoji
 */
class ReactionTypeEmoji extends ReactionType
{
    public function __construct(
        public readonly string $type,
        public readonly string $emoji,
    ) {
    }
}
