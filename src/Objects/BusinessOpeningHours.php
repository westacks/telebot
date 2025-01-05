<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes the opening hours of a business.
 *
 * @property string                         $time_zone_name Unique name of the time zone for which the opening hours are defined
 * @property BusinessOpeningHoursInterval[] $opening_hours  List of time intervals describing business opening hours
 */
class BusinessOpeningHours extends ReactionType
{
    protected $attributes = [
        'time_zone_name' => 'string',
        'opening_hours' => 'BusinessOpeningHoursInterval[]',
    ];
}
