<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about tasks added to a checklist.
 * @property-read ?Message $checklist_message Optional. Message containing the checklist to which the tasks were added. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read ChecklistTask[] $tasks List of tasks added to the checklist
 *
 * @see https://core.telegram.org/bots/api#checklisttasksadded
 */
class ChecklistTasksAdded extends TelegramObject
{
    public function __construct(
        public readonly ?Message $checklist_message,
        public readonly array $tasks,
    ) {
    }
}
