<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a checklist to create.
 * @property-read string $title Title of the checklist; 1-255 characters after entities parsing
 * @property-read ?string $parse_mode Optional. Mode for parsing entities in the title. See formatting options for more details.
 * @property-read ?MessageEntity[] $title_entities Optional. List of special entities that appear in the title, which can be specified instead of parse_mode. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are allowed.
 * @property-read InputChecklistTask[] $tasks List of 1-30 tasks in the checklist
 * @property-read ?bool $others_can_add_tasks Optional. Pass True if other users can add tasks to the checklist
 * @property-read ?bool $others_can_mark_tasks_as_done Optional. Pass True if other users can mark tasks as done or not done in the checklist
 *
 * @see https://core.telegram.org/bots/api#inputchecklist
 */
class InputChecklist extends TelegramObject
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $parse_mode,
        public readonly ?array $title_entities,
        public readonly array $tasks,
        public readonly ?bool $others_can_add_tasks,
        public readonly ?bool $others_can_mark_tasks_as_done,
    ) {
    }
}
