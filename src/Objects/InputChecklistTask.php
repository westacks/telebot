<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a task to add to a checklist.
 * @property-read int $id Unique identifier of the task; must be positive and unique among all task identifiers currently present in the checklist
 * @property-read string $text Text of the task; 1-100 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the text. See formatting options for more details.
 * @property-read ?MessageEntity[] $text_entities Optional. List of special entities that appear in the text, which can be specified instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
 *
 * @see https://core.telegram.org/bots/api#inputchecklisttask
 */
class InputChecklistTask extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $text,
        public readonly ?string $parse_mode,
        public readonly ?array $text_entities,
    ) {
    }
}
