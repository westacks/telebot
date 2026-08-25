<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A block with a video, corresponding to the HTML tag <video>.
 * @property-read string $type Type of the block, always “video”
 * @property-read Video $video The video
 * @property-read ?true $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockvideo
 */
class RichBlockVideo extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly Video $video,
        public readonly ?true $has_spoiler,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
