<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a sticker.
 * @property-read string $file_id Identifier for this file, which can be used to download or reuse the file
 * @property-read string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @property-read string $type Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
 * @property-read int $width Sticker width
 * @property-read int $height Sticker height
 * @property-read bool $is_animated True, if the sticker is animated
 * @property-read bool $is_video True, if the sticker is a video sticker
 * @property-read ?PhotoSize $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format
 * @property-read ?string $emoji Optional. Emoji associated with the sticker
 * @property-read ?string $set_name Optional. Name of the sticker set to which the sticker belongs
 * @property-read ?File $premium_animation Optional. For premium regular stickers, premium animation for the sticker
 * @property-read ?MaskPosition $mask_position Optional. For mask stickers, the position where the mask should be placed
 * @property-read ?string $custom_emoji_id Optional. For custom emoji stickers, unique identifier of the custom emoji
 * @property-read ?true $needs_repainting Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
 * @property-read ?int $file_size Optional. File size in bytes
 *
 * @see https://core.telegram.org/bots/api#sticker
 */
class Sticker extends TelegramObject
{
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly string $type,
        public readonly int $width,
        public readonly int $height,
        public readonly bool $is_animated,
        public readonly bool $is_video,
        public readonly ?PhotoSize $thumbnail,
        public readonly ?string $emoji,
        public readonly ?string $set_name,
        public readonly ?File $premium_animation,
        public readonly ?MaskPosition $mask_position,
        public readonly ?string $custom_emoji_id,
        public readonly ?true $needs_repainting,
        public readonly ?int $file_size,
    ) {
    }
}
