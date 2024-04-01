<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents one interval of the opening hours
 *
 * @property int $opening_minute  The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the business is open; 0 - 7 24 60
 * @property int $closing_minute  The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the business is open; 0 - 8 24 60
 */
class BusinessOpeningHoursInterval extends ReactionType
{
    protected $attributes = [
        'opening_minute' => 'integer',
        'closing_minute' => 'integer',
    ];
}
