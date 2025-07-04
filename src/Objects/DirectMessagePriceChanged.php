<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a change in the price of direct messages sent to a channel chat.
 * @property-read bool $are_direct_messages_enabled True, if direct messages are enabled for the channel chat; false otherwise
 * @property-read ?int $direct_message_star_count Optional. The new number of Telegram Stars that must be paid by users for each direct message sent to the channel. Does not apply to users who have been exempted by administrators. Defaults to 0.
 *
 * @see https://core.telegram.org/bots/api#directmessagepricechanged
 */
class DirectMessagePriceChanged extends TelegramObject
{
    public function __construct(
        public readonly bool $are_direct_messages_enabled,
        public readonly ?int $direct_message_star_count,
    ) {
    }
}
