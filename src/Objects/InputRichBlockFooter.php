<?php

namespace WeStacks\TeleBot\Objects;

/**
 * A footer, corresponding to the HTML tag <footer>.
 * @property-read string $type Type of the block, always “footer”
 * @property-read RichText $text Text of the block
 *
 * @see https://core.telegram.org/bots/api#inputrichblockfooter
 */
class InputRichBlockFooter extends InputRichBlock
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
