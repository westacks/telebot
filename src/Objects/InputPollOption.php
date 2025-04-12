<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about one answer option in a poll to be sent.
 * @property-read string $text Option text, 1-100 characters
 * @property-read ?string $text_parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details. Currently, only custom emoji entities are allowed
 * @property-read ?MessageEntity[] $text_entities Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be specified instead of text_parse_mode
 *
 * @see https://core.telegram.org/bots/api#inputpolloption
 */
class InputPollOption extends TelegramObject
{
    public function __construct(
        public readonly string $text,
        public readonly ?string $text_parse_mode,
        public readonly ?array $text_entities,
    ) {
    }
}
