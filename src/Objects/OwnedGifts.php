<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Contains the list of gifts received and owned by a user or a chat.
 * @property-read int $total_count The total number of gifts owned by the user or the chat
 * @property-read OwnedGift[] $gifts The list of gifts
 * @property-read ?string $next_offset Optional. Offset for the next request. If empty, then there are no more results
 *
 * @see https://core.telegram.org/bots/api#ownedgifts
 */
class OwnedGifts extends TelegramObject
{
    public function __construct(
        public readonly int $total_count,
        public readonly array $gifts,
        public readonly ?string $next_offset,
    ) {
    }
}
