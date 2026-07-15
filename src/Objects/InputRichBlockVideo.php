<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a video, corresponding to the HTML tag <video>.
 * @property-read string $type Type of the block, always “video”
 * @property-read InputMediaVideo $video The video. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockvideo
 */
class InputRichBlockVideo extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaVideo $video,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
