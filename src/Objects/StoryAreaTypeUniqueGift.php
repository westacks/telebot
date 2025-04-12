<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a story area pointing to a unique gift. Currently, a story can have at most 1 unique gift area.
 * @property-read string $type Type of the area, always “unique_gift”
 * @property-read string $name Unique name of the gift
 *
 * @see https://core.telegram.org/bots/api#storyareatypeuniquegift
 */
class StoryAreaTypeUniqueGift extends StoryAreaType
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
    ) {
    }
}
