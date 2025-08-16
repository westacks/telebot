<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains parameters of a post that is being suggested by the bot.
 * @property-read ?SuggestedPostPrice $price Optional. Proposed price for the post. If the field is omitted, then the post is unpaid.
 * @property-read ?int $send_date Optional. Proposed send date of the post. If specified, then the date must be between 300 second and 2678400 seconds (30 days) in the future. If the field is omitted, then the post can be published at any time within 30 days at the sole discretion of the user who approves it.
 *
 * @see https://core.telegram.org/bots/api#suggestedpostparameters
 */
class SuggestedPostParameters extends TelegramObject
{
    public function __construct(
        public readonly ?SuggestedPostPrice $price,
        public readonly ?int $send_date,
    ) {
    }
}
