<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a gift that can be sent by the bot.
 * @property-read string $id Unique identifier of the gift
 * @property-read Sticker $sticker The sticker that represents the gift
 * @property-read int $star_count The number of Telegram Stars that must be paid to send the sticker
 * @property-read ?int $upgrade_star_count Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one
 * @property-read ?true $is_premium Optional. True, if the gift can only be purchased by Telegram Premium subscribers
 * @property-read ?true $has_colors Optional. True, if the gift can be used (after being upgraded) to customize a user's appearance
 * @property-read ?int $total_count Optional. The total number of gifts of this type that can be sent by all users; for limited gifts only
 * @property-read ?int $remaining_count Optional. The number of remaining gifts of this type that can be sent by all users; for limited gifts only
 * @property-read ?int $personal_total_count Optional. The total number of gifts of this type that can be sent by the bot; for limited gifts only
 * @property-read ?int $personal_remaining_count Optional. The number of remaining gifts of this type that can be sent by the bot; for limited gifts only
 * @property-read ?GiftBackground $background Optional. Background of the gift
 * @property-read ?int $unique_gift_variant_count Optional. The total number of different unique gifts that can be obtained by upgrading the gift
 * @property-read ?Chat $publisher_chat Optional. Information about the chat that published the gift
 *
 * @see https://core.telegram.org/bots/api#gift
 */
class Gift extends TelegramObject
{
    public function __construct(
        public readonly string $id,
        public readonly Sticker $sticker,
        public readonly int $star_count,
        public readonly ?int $upgrade_star_count,
        public readonly ?true $is_premium,
        public readonly ?true $has_colors,
        public readonly ?int $total_count,
        public readonly ?int $remaining_count,
        public readonly ?int $personal_total_count,
        public readonly ?int $personal_remaining_count,
        public readonly ?GiftBackground $background,
        public readonly ?int $unique_gift_variant_count,
        public readonly ?Chat $publisher_chat,
    ) {
    }
}
