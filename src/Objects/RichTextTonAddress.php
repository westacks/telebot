<?php

namespace WeStacks\TeleBot\Objects;

/**
 * An address in the TON blockchain.
 * @property-read string $type Type of the rich text, always “ton_address”
 * @property-read RichText $text Text of the address
 * @property-read string $address The address
 *
 * @see https://core.telegram.org/bots/api#richtexttonaddress
 */
class RichTextTonAddress extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $address,
    ) {
    }
}
