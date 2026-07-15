<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with an animation, corresponding to the HTML tag <video>.
 * @property-read string $type Type of the block, always “animation”
 * @property-read InputMediaAnimation $animation The animation. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockanimation
 */
class InputRichBlockAnimation extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaAnimation $animation,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
