<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with an animation, corresponding to the HTML tag <video>.
 * @property-read string $type Type of the block, always “animation”
 * @property-read Animation $animation The animation
 * @property-read ?true $has_spoiler Optional. True, if the media preview is covered by a spoiler animation
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockanimation
 */
class RichBlockAnimation extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly Animation $animation,
        public readonly ?true $has_spoiler,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
