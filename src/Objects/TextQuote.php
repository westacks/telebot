<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 * @property-read string $text Text of the quoted part of a message that is replied to by the given message
 * @property-read ?MessageEntity[] $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
 * @property-read int $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
 * @property-read ?true $is_manual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
 *
 * @see https://core.telegram.org/bots/api#textquote
 */
class TextQuote extends TelegramObject
{
    public function __construct(
        public readonly string $text,
        public readonly ?array $entities,
        public readonly int $position,
        public readonly ?true $is_manual,
    ) {
    }
}
