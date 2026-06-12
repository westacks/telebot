<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A slideshow, corresponding to the custom HTML tag <tg-slideshow>.
 * @property-read string $type Type of the block, always “slideshow”
 * @property-read RichBlock[] $blocks Elements of the slideshow
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockslideshow
 */
class RichBlockSlideshow extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
