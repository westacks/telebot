<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a service message about checklist tasks marked as done or not done.
 * @property-read ?Message $checklist_message Optional. Message containing the checklist whose tasks were marked as done or not done. Note that the Message object in this field will not contain the reply_to_message field even if it itself is a reply.
 * @property-read ?int[] $marked_as_done_task_ids Optional. Identifiers of the tasks that were marked as done
 * @property-read ?int[] $marked_as_not_done_task_ids Optional. Identifiers of the tasks that were marked as not done
 *
 * @see https://core.telegram.org/bots/api#checklisttasksdone
 */
class ChecklistTasksDone extends TelegramObject
{
    public function __construct(
        public readonly ?Message $checklist_message,
        public readonly ?array $marked_as_done_task_ids,
        public readonly ?array $marked_as_not_done_task_ids,
    ) {
    }
}
