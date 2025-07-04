<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a task in a checklist.
 * @property-read int $id Unique identifier of the task
 * @property-read string $text Text of the task
 * @property-read ?MessageEntity[] $text_entities Optional. Special entities that appear in the task text
 * @property-read ?User $completed_by_user Optional. User that completed the task; omitted if the task wasn't completed
 * @property-read ?int $completion_date Optional. Point in time (Unix timestamp) when the task was completed; 0 if the task wasn't completed
 *
 * @see https://core.telegram.org/bots/api#checklisttask
 */
class ChecklistTask extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $text,
        public readonly ?array $text_entities,
        public readonly ?User $completed_by_user,
        public readonly ?int $completion_date,
    ) {
    }
}
