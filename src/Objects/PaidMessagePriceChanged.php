<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a change in the price of paid messages within a chat.
 * @property-read int $paid_message_star_count The new number of Telegram Stars that must be paid by non-administrator users of the supergroup chat for each sent message
 *
 * @see https://core.telegram.org/bots/api#paidmessagepricechanged
 */
class PaidMessagePriceChanged extends TelegramObject
{
    public function __construct(
        public readonly int $paid_message_star_count,
    ) {
    }
}
