<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Transfers an owned unique gift to another user. Requires the can_transfer_and_upgrade_gifts business bot right. Requires can_transfer_stars business bot right if the transfer is paid. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read string $owned_gift_id Unique identifier of the regular gift that should be transferred
 * @property-read int $new_owner_chat_id Unique identifier of the chat which will own the gift. The chat must be active in the last 24 hours.
 * @property-read ?int $star_count The amount of Telegram Stars that will be paid for the transfer from the business account balance. If positive, then the can_transfer_stars business bot right is required.
 *
 * @see https://core.telegram.org/bots/api#transfergift
 */
class TransferGiftMethod extends TelegramMethod
{
    protected string $method = 'transferGift';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly string $owned_gift_id,
        public readonly int $new_owner_chat_id,
        public readonly ?int $star_count,
    ) {
    }
}
