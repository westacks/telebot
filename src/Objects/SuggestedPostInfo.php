<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains information about a suggested post.
 * @property-read string $state State of the suggested post. Currently, it can be one of “pending”, “approved”, “declined”.
 * @property-read ?SuggestedPostPrice $price Optional. Proposed price of the post. If the field is omitted, then the post is unpaid.
 * @property-read ?int $send_date Optional. Proposed send date of the post. If the field is omitted, then the post can be published at any time within 30 days at the sole discretion of the user or administrator who approves it.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostinfo
 */
class SuggestedPostInfo extends TelegramObject
{
    public function __construct(
        public readonly string $state,
        public readonly ?SuggestedPostPrice $price,
        public readonly ?int $send_date,
    ) {
    }
}
