<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about the rejection of a suggested post.
 * @property-read ?Message $suggested_post_message Optional. Message containing the suggested post. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read ?string $comment Optional. Comment with which the post was declined
 *
 * @see https://core.telegram.org/bots/api#suggestedpostdeclined
 */
class SuggestedPostDeclined extends TelegramObject
{
    public function __construct(
        public readonly ?Message $suggested_post_message,
        public readonly ?string $comment,
    ) {
    }
}
