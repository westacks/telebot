<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineKeyboardMarkup;
use WeStacks\TeleBot\Objects\InputChecklist;

/**
 * Use this method to edit a checklist on behalf of a connected business account. On success, the edited Message is returned.
 *
 * @property-read string $business_connection_id Unique identifier of the business connection on behalf of which the message will be sent
 * @property-read int $chat_id Unique identifier for the target chat
 * @property-read int $message_id Unique identifier for the target message
 * @property-read InputChecklist $checklist A JSON-serialized object for the new checklist
 * @property-read ?InlineKeyboardMarkup $reply_markup A JSON-serialized object for the new inline keyboard for the message
 *
 * @see https://core.telegram.org/bots/api#editmessagechecklist
 */
class EditMessageChecklistMethod extends TelegramMethod
{
    protected string $method = 'editMessageChecklist';
    protected array $expect = ['Message'];

    public function __construct(
        public readonly string $business_connection_id,
        public readonly int $chat_id,
        public readonly int $message_id,
        public readonly InputChecklist $checklist,
        public readonly ?InlineKeyboardMarkup $reply_markup,
    ) {
    }
}
