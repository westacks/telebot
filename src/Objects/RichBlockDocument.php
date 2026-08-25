<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a general file, corresponding to the custom HTML tag <tg-document>.
 * @property-read string $type Type of the block, always “document”
 * @property-read Document $document The document
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#richblockdocument
 */
class RichBlockDocument extends RichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly Document $document,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
