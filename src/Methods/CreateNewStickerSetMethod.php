<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
 *
 * @property-read int $user_id User identifier of created sticker set owner
 * @property-read string $name Short name of sticker set, to be used in t.me/addstickers/ URLs (e.g., animals). Can contain only English letters, digits and underscores. Must begin with a letter, can't contain consecutive underscores and must end in "_by_<bot_username>". <bot_username> is case insensitive. 1-64 characters.
 * @property-read string $title Sticker set title, 1-64 characters
 * @property-read InputSticker[] $stickers A JSON-serialized list of 1-50 initial stickers to be added to the sticker set
 * @property-read ?string $sticker_type Type of stickers in the set, pass “regular”, “mask”, or “custom_emoji”. By default, a regular sticker set is created.
 * @property-read ?bool $needs_repainting Pass True if stickers in the sticker set must be repainted to the color of text when used in messages, the accent color if used as emoji status, white on chat photos, or another appropriate color based on context; for custom emoji sticker sets only
 *
 * @see https://core.telegram.org/bots/api#createnewstickerset
 */
class CreateNewStickerSetMethod extends TelegramMethod
{
    protected string $method = 'createNewStickerSet';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int $user_id,
        public readonly string $name,
        public readonly string $title,
        public readonly array $stickers,
        public readonly ?string $sticker_type,
        public readonly ?bool $needs_repainting,
    ) {
    }
}
