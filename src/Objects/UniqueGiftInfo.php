<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about a unique gift that was sent or received.
 * @property-read UniqueGift $gift Information about the gift
 * @property-read string $origin Origin of the gift. Currently, either “upgrade” or “transfer”
 * @property-read ?string $owned_gift_id Optional. Unique identifier of the received gift for the bot; only present for gifts received on behalf of business accounts
 * @property-read ?int $transfer_star_count Optional. Number of Telegram Stars that must be paid to transfer the gift; omitted if the bot cannot transfer the gift
 *
 * @see https://core.telegram.org/bots/api#uniquegiftinfo
 */
class UniqueGiftInfo extends TelegramObject
{
    public function __construct(
        public readonly UniqueGift $gift,
        public readonly string $origin,
        public readonly ?string $owned_gift_id,
        public readonly ?int $transfer_star_count,
    ) {
    }
}
