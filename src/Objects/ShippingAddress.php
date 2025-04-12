<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a shipping address.
 * @property-read string $country_code Two-letter ISO 3166-1 alpha-2 country code
 * @property-read string $state State, if applicable
 * @property-read string $city City
 * @property-read string $street_line1 First line for the address
 * @property-read string $street_line2 Second line for the address
 * @property-read string $post_code Address post code
 *
 * @see https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends TelegramObject
{
    public function __construct(
        public readonly string $country_code,
        public readonly string $state,
        public readonly string $city,
        public readonly string $street_line1,
        public readonly string $street_line2,
        public readonly string $post_code,
    ) {
    }
}
