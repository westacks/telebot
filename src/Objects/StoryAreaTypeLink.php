<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a story area pointing to an HTTP or tg:// link. Currently, a story can have up to 3 link areas.
 * @property-read string $type Type of the area, always “link”
 * @property-read string $url HTTP or tg:// URL to be opened when the area is clicked
 *
 * @see https://core.telegram.org/bots/api#storyareatypelink
 */
class StoryAreaTypeLink extends StoryAreaType
{
    public function __construct(
        public readonly string $type,
        public readonly string $url,
    ) {
    }
}
