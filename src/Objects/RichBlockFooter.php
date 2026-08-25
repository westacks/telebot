<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A footer, corresponding to the HTML tag <footer>.
 * @property-read string $type Type of the block, always “footer”
 * @property-read RichText $text Text of the block
 *
 * @see https://core.telegram.org/bots/api#richblockfooter
 */
class RichBlockFooter extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
    ) {
    }
}
