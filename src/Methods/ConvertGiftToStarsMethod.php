<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Converts a given regular gift to Telegram Stars. Requires the can_convert_gifts_to_stars business bot right. Returns True on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read string $owned_gift_id Unique identifier of the regular gift that should be converted to Telegram Stars
 *
 * @see https://core.telegram.org/bots/api#convertgifttostars
 */
class ConvertGiftToStarsMethod extends TelegramMethod
{
    protected string $method = 'convertGiftToStars';
    protected array $expect = ['true'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly string $owned_gift_id,
    ) {
    }
}
