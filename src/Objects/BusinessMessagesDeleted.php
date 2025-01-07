<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object is received when messages are deleted from a connected business account.
 *
 * @property string $business_connection_id Unique identifier of the business connection
 * @property Chat   $chat                   Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
 * @property int[]  $message_ids            The list of identifiers of deleted messages in the chat of the business account
 */
class BusinessMessagesDeleted extends TelegramObject
{
    protected $attributes = [
        'business_connection_id' => 'string',
        'chat' => 'Chat',
        'message_ids' => 'integer[]',
    ];
}
