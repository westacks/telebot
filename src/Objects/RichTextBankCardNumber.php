<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A text with a bank card number.
 * @property-read string $type Type of the rich text, always “bank_card_number”
 * @property-read string|RichText[]|RichText $text The text
 * @property-read string $bank_card_number The bank card number
 *
 * @see https://core.telegram.org/bots/api#richtextbankcardnumber
 */
class RichTextBankCardNumber extends RichText
{
    public function __construct(
        public readonly string $type,
        public readonly string|array|RichText $text,
        public readonly string $bank_card_number,
    ) {
    }
}
