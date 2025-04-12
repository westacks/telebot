<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;
use WeStacks\TeleBot\Objects\InlineQueryResult;

/**
 * Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object.
 *
 * @property-read int $user_id Unique identifier of the target user that can use the prepared message
 * @property-read InlineQueryResult $result A JSON-serialized object describing the message to be sent
 * @property-read ?bool $allow_user_chats Pass True if the message can be sent to private chats with users
 * @property-read ?bool $allow_bot_chats Pass True if the message can be sent to private chats with bots
 * @property-read ?bool $allow_group_chats Pass True if the message can be sent to group and supergroup chats
 * @property-read ?bool $allow_channel_chats Pass True if the message can be sent to channel chats
 *
 * @see https://core.telegram.org/bots/api#savepreparedinlinemessage
 */
class SavePreparedInlineMessageMethod extends TelegramMethod
{
    protected string $method = 'savePreparedInlineMessage';
    protected array $expect = ['PreparedInlineMessage'];

    public function __construct(
        public readonly int $user_id,
        public readonly InlineQueryResult $result,
        public readonly ?bool $allow_user_chats,
        public readonly ?bool $allow_bot_chats,
        public readonly ?bool $allow_group_chats,
        public readonly ?bool $allow_channel_chats,
    ) {
    }
}
