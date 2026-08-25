<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Represents the scope of bot commands, covering a specific chat.
 * @property-read string $type Scope type, must be chat
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup in the format @username. Channel direct messages chats and channel chats aren't supported.
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechat
 */
class BotCommandScopeChat extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly int|string $chat_id,
    ) {
    }
}
