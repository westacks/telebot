<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a music file, corresponding to the HTML tag <audio>.
 * @property-read string $type Type of the block, always “audio”
 * @property-read InputMediaAudio $audio The audio. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockaudio
 */
class InputRichBlockAudio extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaAudio $audio,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
