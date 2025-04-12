<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes an interval of time during which a business is open.
 * @property-read int $opening_minute The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the business is open; 0 - 7 * 24 * 60
 * @property-read int $closing_minute The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the business is open; 0 - 8 * 24 * 60
 *
 * @see https://core.telegram.org/bots/api#businessopeninghoursinterval
 */
class BusinessOpeningHoursInterval extends TelegramObject
{
    public function __construct(
        public readonly int $opening_minute,
        public readonly int $closing_minute,
    ) {
    }
}
