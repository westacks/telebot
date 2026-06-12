<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Caption of a rich formatted block.
 * @property-read string|RichText[]|RichText $text Block caption
 * @property-read null|string|RichText[]|RichText $credit Optional. Block credit which corresponds to the HTML tag <cite>
 *
 * @see https://core.telegram.org/bots/api#richblockcaption
 */
class RichBlockCaption extends TelegramObject
{
    public function __construct(
        public readonly string|array|RichText $text,
        public readonly null|string|array|RichText $credit,
    ) {
    }
}
