<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a photo, corresponding to the HTML tag <img>.
 * @property-read string $type Type of the block, always “photo”
 * @property-read InputMediaPhoto $photo The photo. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockphoto
 */
class InputRichBlockPhoto extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaPhoto $photo,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
