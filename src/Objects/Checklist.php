<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a checklist.
 * @property-read string $title Title of the checklist
 * @property-read ?MessageEntity[] $title_entities Optional. Special entities that appear in the checklist title
 * @property-read ChecklistTask[] $tasks List of tasks in the checklist
 * @property-read ?true $others_can_add_tasks Optional. True, if users other than the creator of the list can add tasks to the list
 * @property-read ?true $others_can_mark_tasks_as_done Optional. True, if users other than the creator of the list can mark tasks as done or not done
 *
 * @see https://core.telegram.org/bots/api#checklist
 */
class Checklist extends TelegramObject
{
    public function __construct(
        public readonly string $title,
        public readonly ?array $title_entities,
        public readonly array $tasks,
        public readonly ?true $others_can_add_tasks,
        public readonly ?true $others_can_mark_tasks_as_done,
    ) {
    }
}
