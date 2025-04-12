<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Changes the emoji status for a given user that previously allowed the bot to manage their emoji status via the Mini App method requestEmojiStatusAccess. Returns True on success.
 *
 * @property-read int $user_id Unique identifier of the target user
 * @property-read ?string $emoji_status_custom_emoji_id Custom emoji identifier of the emoji status to set. Pass an empty string to remove the status.
 * @property-read ?int $emoji_status_expiration_date Expiration date of the emoji status, if any
 *
 * @see https://core.telegram.org/bots/api#setuseremojistatus
 */
class SetUserEmojiStatusMethod extends TelegramMethod
{
    protected string $method = 'setUserEmojiStatus';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly ?string $emoji_status_custom_emoji_id,
        public readonly ?int $emoji_status_expiration_date,
    ) {
    }
}
