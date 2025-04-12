<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a story area containing weather information. Currently, a story can have up to 3 weather areas.
 * @property-read string $type Type of the area, always “weather”
 * @property-read float $temperature Temperature, in degree Celsius
 * @property-read string $emoji Emoji representing the weather
 * @property-read int $background_color A color of the area background in the ARGB format
 *
 * @see https://core.telegram.org/bots/api#storyareatypeweather
 */
class StoryAreaTypeWeather extends StoryAreaType
{
    public function __construct(
        public readonly string $type,
        public readonly float $temperature,
        public readonly string $emoji,
        public readonly int $background_color,
    ) {
    }
}
