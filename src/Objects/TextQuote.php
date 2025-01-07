<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 *
 * @property string          $text      Text of the quoted part of a message that is replied to by the given message
 * @property MessageEntity[] $entities  Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
 * @property int             $position  Approximate quote position in the original message in UTF-16 code units as specified by the sender
 * @property bool            $is_manual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
 */
class TextQuote extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
        'entities' => 'MessageEntity[]',
        'position' => 'integer',
        'is_manual' => 'boolean',
    ];
}
