<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about the approval of a suggested post.
 * @property-read ?Message $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read ?SuggestedPostPrice $price Optional. Amount paid for the post
 * @property-read int $send_date Date when the post will be published
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapproved
 */
class SuggestedPostApproved extends TelegramObject
{
    public function __construct(
        public readonly ?Message $suggested_post_message,
        public readonly ?SuggestedPostPrice $price,
        public readonly int $send_date,
    ) {
    }
}
