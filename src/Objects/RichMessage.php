<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Rich formatted message.
 * @property-read RichBlock[] $blocks Content of the message
 * @property-read ?bool $is_rtl Optional. True, if the rich message must be shown right-to-left
 *
 * @see https://core.telegram.org/bots/api#richmessage
 */
class RichMessage extends TelegramObject
{
    public function __construct(
        public readonly array $blocks,
        public readonly ?bool $is_rtl,
    ) {
    }
}
