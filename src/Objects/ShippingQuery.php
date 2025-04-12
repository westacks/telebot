<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about an incoming shipping query.
 * @property-read string $id Unique query identifier
 * @property-read User $from User who sent the query
 * @property-read string $invoice_payload Bot-specified invoice payload
 * @property-read ShippingAddress $shipping_address User specified shipping address
 *
 * @see https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly User $from,
        public readonly string $invoice_payload,
        public readonly ShippingAddress $shipping_address,
    ) {
    }
}
