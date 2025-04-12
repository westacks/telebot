<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents information about an order.
 * @property-read ?string $name Optional. User name
 * @property-read ?string $phone_number Optional. User's phone number
 * @property-read ?string $email Optional. User email
 * @property-read ?ShippingAddress $shipping_address Optional. User shipping address
 *
 * @see https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends TelegramObject
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $phone_number,
        public readonly ?string $email,
        public readonly ?ShippingAddress $shipping_address,
    ) {
    }
}
