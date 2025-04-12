<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the opening hours of a business.
 * @property-read string $time_zone_name Unique name of the time zone for which the opening hours are defined
 * @property-read BusinessOpeningHoursInterval[] $opening_hours List of time intervals describing business opening hours
 *
 * @see https://core.telegram.org/bots/api#businessopeninghours
 */
class BusinessOpeningHours extends TelegramObject
{
    public function __construct(
        public readonly string $time_zone_name,
        public readonly array $opening_hours,
    ) {
    }
}
