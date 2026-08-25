<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * A bot command.
 * @property-read string $type Type of the rich text, always “bot_command”
 * @property-read RichText $text The text
 * @property-read string $bot_command The bot command
 *
 * @see https://core.telegram.org/bots/api#richtextbotcommand
 */
class RichTextBotCommand extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly RichText $text,
        public readonly string $bot_command,
    ) {
    }
}
