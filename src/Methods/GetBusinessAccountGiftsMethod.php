<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Returns the gifts received and owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns OwnedGifts on success.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection
 * @property-read ?bool $exclude_unsaved Pass True to exclude gifts that aren't saved to the account's profile page
 * @property-read ?bool $exclude_saved Pass True to exclude gifts that are saved to the account's profile page
 * @property-read ?bool $exclude_unlimited Pass True to exclude gifts that can be purchased an unlimited number of times
 * @property-read ?bool $exclude_limited Pass True to exclude gifts that can be purchased a limited number of times
 * @property-read ?bool $exclude_unique Pass True to exclude unique gifts
 * @property-read ?bool $sort_by_price Pass True to sort results by gift price instead of send date. Sorting is applied before pagination.
 * @property-read ?string $offset Offset of the first entry to return as received from the previous request; use empty string to get the first chunk of results
 * @property-read ?int $limit The maximum number of gifts to be returned; 1-100. Defaults to 100
 *
 * @see https://core.telegram.org/bots/api#getbusinessaccountgifts
 */
class GetBusinessAccountGiftsMethod extends TelegramMethod
{
    protected string $method = 'getBusinessAccountGifts';
    protected array $expect = [];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly ?bool $exclude_unsaved,
        public readonly ?bool $exclude_saved,
        public readonly ?bool $exclude_unlimited,
        public readonly ?bool $exclude_limited,
        public readonly ?bool $exclude_unique,
        public readonly ?bool $sort_by_price,
        public readonly ?string $offset,
        public readonly ?int $limit,
    ) {
    }
}
