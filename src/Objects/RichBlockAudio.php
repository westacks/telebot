<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a music file, corresponding to the HTML tag <audio>.
 * @property-read string $type Type of the block, always “audio”
 * @property-read Audio $audio The audio
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockaudio
 */
class RichBlockAudio extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly Audio $audio,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
