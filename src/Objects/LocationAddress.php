<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes the physical address of a location.
 * @property-read string $country_code The two-letter ISO 3166-1 alpha-2 country code of the country where the location is located
 * @property-read ?string $state Optional. State of the location
 * @property-read ?string $city Optional. City of the location
 * @property-read ?string $street Optional. Street address of the location
 *
 * @see https://core.telegram.org/bots/api#locationaddress
 */
class LocationAddress extends TelegramObject
{
    public function __construct(
        public readonly string $country_code,
        public readonly ?string $state,
        public readonly ?string $city,
        public readonly ?string $street,
    ) {
    }
}
