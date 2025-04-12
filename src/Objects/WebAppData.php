<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes data sent from a Web App to the bot.
 * @property-read string $data The data. Be aware that a bad client can send arbitrary data in this field.
 * @property-read string $button_text Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
 *
 * @see https://core.telegram.org/bots/api#webappdata
 */
class WebAppData extends TelegramObject
{
    public function __construct(
        public readonly string $data,
        public readonly string $button_text,
    ) {
    }
}
