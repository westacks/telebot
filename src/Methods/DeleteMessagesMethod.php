<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;

/**
 * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
 *
 * @property string $chat_id     __Required: Yes__. Unique identifier for the target chat or username of the target channel (in the format @channelusername)
 * @property int[]  $message_ids __Required: Yes__. A JSON-serialized list of 1-100 identifiers of messages to delete. See [deleteMessage](https://core.telegram.org/bots/api#deletemessage) for limitations on which messages can be deleted
 */
class DeleteMessagesMethod extends TelegramMethod
{
    protected string $method = 'deleteMessages';

    protected string $expect = 'boolean';

    protected array $parameters = [
        'chat_id' => 'string',
        'message_ids' => 'integer[]',
    ];

    public function mock($arguments)
    {
        return true;
    }
}
