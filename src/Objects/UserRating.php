<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object describes the rating of a user based on their Telegram Star spendings.
 * @property-read int $level Current level of the user, indicating their reliability when purchasing digital goods and services. A higher level suggests a more trustworthy customer; a negative level is likely reason for concern.
 * @property-read int $rating Numerical value of the user's rating; the higher the rating, the better
 * @property-read int $current_level_rating The rating value required to get the current level
 * @property-read ?int $next_level_rating Optional. The rating value required to get to the next level; omitted if the maximum level was reached
 *
 * @see https://core.telegram.org/bots/api#userrating
 */
class UserRating extends TelegramObject
{
    public function __construct(
        public readonly int $level,
        public readonly int $rating,
        public readonly int $current_level_rating,
        public readonly ?int $next_level_rating,
    ) {
    }
}
