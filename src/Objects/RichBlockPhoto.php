<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block with a photo, corresponding to the HTML tag <img>.
 * @property-read string $type Type of the block, always “photo”
 * @property-read PhotoSize[] $photo Available sizes of the photo
 * @property-read ?true $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockphoto
 */
class RichBlockPhoto extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly array $photo,
        public readonly ?true $has_spoiler,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
