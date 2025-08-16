<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a successful payment for a suggested post.
 * @property-read ?Message $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read string $currency Currency in which the payment was made. Currently, one of “XTR” for Telegram Stars or “TON” for toncoins
 * @property-read ?int $amount Optional. The amount of the currency that was received by the channel in nanotoncoins; for payments in toncoins only
 * @property-read ?StarAmount $star_amount Optional. The amount of Telegram Stars that was received by the channel; for payments in Telegram Stars only
 *
 * @see https://core.telegram.org/bots/api#suggestedpostpaid
 */
class SuggestedPostPaid extends TelegramObject
{
    public function __construct(
        public readonly ?Message $suggested_post_message,
        public readonly string $currency,
        public readonly ?int $amount,
        public readonly ?StarAmount $star_amount,
    ) {
    }
}
