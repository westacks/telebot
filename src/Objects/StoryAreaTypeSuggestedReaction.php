<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes a story area pointing to a suggested reaction. Currently, a story can have up to 5 suggested reaction areas.
 * @property-read string $type Type of the area, always “suggested_reaction”
 * @property-read ReactionType $reaction_type Type of the reaction
 * @property-read ?bool $is_dark Optional. Pass True if the reaction area has a dark background
 * @property-read ?bool $is_flipped Optional. Pass True if reaction area corner is flipped
 *
 * @see https://core.telegram.org/bots/api#storyareatypesuggestedreaction
 */
class StoryAreaTypeSuggestedReaction extends StoryAreaType
{
    public function __construct(
        public readonly string $type,
        public readonly ReactionType $reaction_type,
        public readonly ?bool $is_dark,
        public readonly ?bool $is_flipped,
    ) {
    }
}
