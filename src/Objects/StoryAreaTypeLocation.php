<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a story area pointing to a location. Currently, a story can have up to 10 location areas.
 * @property-read string $type Type of the area, always “location”
 * @property-read float $latitude Location latitude in degrees
 * @property-read float $longitude Location longitude in degrees
 * @property-read ?LocationAddress $address Optional. Address of the location
 *
 * @see https://core.telegram.org/bots/api#storyareatypelocation
 */
class StoryAreaTypeLocation extends StoryAreaType
{
    public function __construct(
        public readonly string $type,
        public readonly float $latitude,
        public readonly float $longitude,
        public readonly ?LocationAddress $address,
    ) {
    }
}
