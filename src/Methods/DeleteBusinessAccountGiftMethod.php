<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Deletes a regular gift owned by a managed business account without receiving Telegram Stars for it. Requires the can_convert_gifts_to_stars business bot right. The gift can be deleted only if it isn't limited (the field total_count of the Gift is omitted) and wasn't refunded. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read string $owned_gift_id Unique identifier of the regular gift that should be deleted
 *
 * @see https://core.telegram.org/bots/api#deletebusinessaccountgift
 */
class DeleteBusinessAccountGiftMethod extends TelegramMethod
{
    protected string $method = 'deleteBusinessAccountGift';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly string $owned_gift_id,
    ) {
    }
}
