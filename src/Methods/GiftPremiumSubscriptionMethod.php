<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\MessageEntity;

/**
 * Gifts a Telegram Premium subscription to the given user. Returns True on success.
 *
 * @property-read int $user_id Unique identifier of the target user who will receive a Telegram Premium subscription
 * @property-read int $month_count Number of months the Telegram Premium subscription will be active for the user; must be one of 3, 6, or 12
 * @property-read int $star_count Number of Telegram Stars to pay for the Telegram Premium subscription; must be 1000 for 3 months, 1500 for 6 months, and 2500 for 12 months
 * @property-read ?string $text Text that will be shown along with the service message about the subscription; 0-128 characters
 * @property-read ?string $text_parse_mode Mode for parsing entities in the text. See formatting options for more details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 * @property-read ?MessageEntity[] $text_entities A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 *
 * @see https://core.telegram.org/bots/api#giftpremiumsubscription
 */
class GiftPremiumSubscriptionMethod extends TelegramMethod
{
    protected string $method = 'giftPremiumSubscription';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly int $month_count,
        public readonly int $star_count,
        public readonly ?string $text,
        public readonly ?string $text_parse_mode,
        public readonly ?array $text_entities,
    ) {
    }
}
