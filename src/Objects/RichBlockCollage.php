<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A collage, corresponding to the custom HTML tag <tg-collage>.
 * @property-read string $type Type of the block, always “collage”
 * @property-read RichBlock[] $blocks Elements of the collage
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockcollage
 */
class RichBlockCollage extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly array $blocks,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
