<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Caption of a rich formatted block.
 * @property-read RichText $text Block caption
 * @property-read ?RichText $credit Optional. Block credit which corresponds to the HTML tag <cite>
 *
 * @see https://core.telegram.org/bots/api#richblockcaption
 */
class RichBlockCaption extends TelegramObject
{
    public function __construct(
        public readonly RichText $text,
        public readonly ?RichText $credit,
    ) {
    }
}
