<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a payment refund for a suggested post.
 * @property-read ?Message $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read string $reason Reason for the refund. Currently, one of “post_deleted” if the post was deleted within 24 hours of being posted or removed from scheduled messages without being posted, or “payment_refunded” if the payer refunded their payment.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostrefunded
 */
class SuggestedPostRefunded extends TelegramObject
{
    public function __construct(
        public readonly ?Message $suggested_post_message,
        public readonly string $reason,
    ) {
    }
}
