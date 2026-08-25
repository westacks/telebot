<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A block with a general file, corresponding to the custom HTML tag <tg-document>.
 * @property-read string $type Type of the block, always “document”
 * @property-read InputMediaDocument $document The document. Caption is ignored.
 * @property-read ?RichBlockCaption $caption Optional. Caption of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockdocument
 */
class InputRichBlockDocument extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly InputMediaDocument $document,
        public readonly ?RichBlockCaption $caption,
    ) {
    }
}
