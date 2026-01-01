<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Returns the gifts owned and hosted by a user. Returns OwnedGifts on success.
 *
 * @property-read int $user_id Unique identifier of the user
 * @property-read ?bool $exclude_unlimited Pass True to exclude gifts that can be purchased an unlimited number of times
 * @property-read ?bool $exclude_limited_upgradable Pass True to exclude gifts that can be purchased a limited number of times and can be upgraded to unique
 * @property-read ?bool $exclude_limited_non_upgradable Pass True to exclude gifts that can be purchased a limited number of times and can't be upgraded to unique
 * @property-read ?bool $exclude_from_blockchain Pass True to exclude gifts that were assigned from the TON blockchain and can't be resold or transferred in Telegram
 * @property-read ?bool $exclude_unique Pass True to exclude unique gifts
 * @property-read ?bool $sort_by_price Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
 * @property-read ?string $offset Offset of the first entry to return as received from the previous request; use an empty string to get the first chunk of results
 * @property-read ?int $limit The maximum number of gifts to be returned; 1-100. Defaults to 100
 *
 * @see https://core.telegram.org/bots/api#getusergifts
 */
class GetUserGiftsMethod extends TelegramMethod
{
    protected string $method = 'getUserGifts';
    protected array $expect = [];

    public function __construct(
        public readonly int $user_id,
        public readonly ?bool $exclude_unlimited,
        public readonly ?bool $exclude_limited_upgradable,
        public readonly ?bool $exclude_limited_non_upgradable,
        public readonly ?bool $exclude_from_blockchain,
        public readonly ?bool $exclude_unique,
        public readonly ?bool $sort_by_price,
        public readonly ?string $offset,
        public readonly ?int $limit,
    ) {
    }
}
