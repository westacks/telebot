<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Sends a gift to the given user or channel chat. The gift can't be converted to Telegram Stars by the receiver. Returns True on success.
 *
 * @property-read ?int $user_id Required if chat_id is not specified. Unique identifier of the target user who will receive the gift.
 * @property-read null|int|string $chat_id Required if user_id is not specified. Unique identifier for the chat or username of the channel (in the format @channelusername) that will receive the gift.
 * @property-read string $gift_id Identifier of the gift
 * @property-read ?bool $pay_for_upgrade Pass True to pay for the gift upgrade from the bot's balance, thereby making the upgrade free for the receiver
 * @property-read ?string $text Text that will be shown along with the gift; 0-128 characters
 * @property-read ?string $text_parse_mode Mode for parsing entities in the text. See formatting options for more details. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 * @property-read ?MessageEntity[] $text_entities A JSON-serialized list of special entities that appear in the gift text. It can be specified instead of text_parse_mode. Entities other than “bold”, “italic”, “underline”, “strikethrough”, “spoiler”, and “custom_emoji” are ignored.
 *
 * @see https://core.telegram.org/bots/api#sendgift
 */
class SendGiftMethod extends TelegramMethod
{
    protected string $method = 'sendGift';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?int $user_id,
        public readonly null|int|string $chat_id,
        public readonly string $gift_id,
        public readonly ?bool $pay_for_upgrade,
        public readonly ?string $text,
        public readonly ?string $text_parse_mode,
        public readonly ?array $text_entities,
    ) {
    }
}
