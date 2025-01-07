<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * Represents a reaction added to a message along with the number of times it was added.
 *
 * @property BusinessIntro|BusinessLocation|BusinessOpeningHours|BusinessOpeningHoursInterval|ReactionTypeCustomEmoji|ReactionTypeEmoji|ReactionTypePaid $type        Type of the reaction
 * @property int                                                                                                                                         $total_count Number of times the reaction was added
 */
class ReactionCount extends TelegramObject
{
    protected $attributes = [
        'type' => 'ReactionType',
        'total_count' => 'integer',
    ];
}
