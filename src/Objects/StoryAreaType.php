<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the type of a clickable area on a story. Currently, it can be one of
 * - [StoryAreaTypeLocation](https://core.telegram.org/bots/api#storyareatypelocation)
 * - [StoryAreaTypeSuggestedReaction](https://core.telegram.org/bots/api#storyareatypesuggestedreaction)
 * - [StoryAreaTypeLink](https://core.telegram.org/bots/api#storyareatypelink)
 * - [StoryAreaTypeWeather](https://core.telegram.org/bots/api#storyareatypeweather)
 * - [StoryAreaTypeUniqueGift](https://core.telegram.org/bots/api#storyareatypeuniquegift)
 *
 * @see https://core.telegram.org/bots/api#storyareatype
 */
abstract class StoryAreaType extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['type']) {
            'location' => StoryAreaTypeLocation::class,
            'suggested_reaction' => StoryAreaTypeSuggestedReaction::class,
            'link' => StoryAreaTypeLink::class,
            'weather' => StoryAreaTypeWeather::class,
            'unique_gift' => StoryAreaTypeUniqueGift::class,
            default => throw new \InvalidArgumentException("Unknown StoryAreaType: ".$parameters['type']),
        };
    }
}
