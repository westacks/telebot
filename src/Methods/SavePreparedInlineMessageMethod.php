<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Contracts\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;
use WeStacks\TeleBot\Objects\PreparedInlineMessage;

/**
 * Stores a message that can be sent by a user of a Mini App. Returns a [PreparedInlineMessage](https://core.telegram.org/bots/api#preparedinlinemessage) object.
 *
 * @property int               $user_id             __Required: Yes__. Unique identifier of the target user that can use the prepared message
 * @property InlineQueryResult $result              __Required: Yes__. A JSON-serialized object describing the message to be sent
 * @property bool              $allow_user_chats    __Required: Optional__. Pass True if the message can be sent to private chats with users
 * @property bool              $allow_bot_chats     __Required: Optional__. Pass True if the message can be sent to private chats with bots
 * @property bool              $allow_group_chats   __Required: Optional__. Pass True if the message can be sent to group and supergroup chats
 * @property bool              $allow_channel_chats __Required: Optional__. Pass True if the message can be sent to channel chats
 */
class SavePreparedInlineMessageMethod extends TelegramMethod
{
    protected string $method = 'savePreparedInlineMessage';

    protected string $expect = 'PreparedInlineMessage';

    protected array $parameters = [
        'user_id' => 'integer',
        'result' => 'InlineQueryResult',
        'allow_user_chats' => 'boolean',
        'allow_bot_chats' => 'boolean',
        'allow_group_chats' => 'boolean',
        'allow_channel_chats' => 'boolean',
    ];

    public function mock($arguments)
    {
        return new PreparedInlineMessage([
            'id' => '1234567890',
            'expiration_date' => mt_rand(1, 100),
        ]);
    }
}
