<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a clickable area on a story media.
 * @property-read StoryAreaPosition $position Position of the area
 * @property-read StoryAreaType $type Type of the area
 *
 * @see https://core.telegram.org/bots/api#storyarea
 */
class StoryArea extends TelegramObject
{
    public function __construct(
        public readonly StoryAreaPosition $position,
        public readonly StoryAreaType $type,
    ) {
    }
}
