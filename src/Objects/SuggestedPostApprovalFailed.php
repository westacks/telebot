<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about the failed approval of a suggested post. Currently, only caused by insufficient user funds at the time of approval.
 * @property-read ?Message $suggested_post_message Optional. Message containing the suggested post whose approval has failed. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read SuggestedPostPrice $price Expected price of the post
 *
 * @see https://core.telegram.org/bots/api#suggestedpostapprovalfailed
 */
class SuggestedPostApprovalFailed extends TelegramObject
{
    public function __construct(
        public readonly ?Message $suggested_post_message,
        public readonly SuggestedPostPrice $price,
    ) {
    }
}
