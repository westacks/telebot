<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents the scope of bot commands, covering a specific member of a group or supergroup chat.
 * @property-read string $type Scope type, must be chat_member
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read int $user_id Unique identifier of the target user
 *
 * @see https://core.telegram.org/bots/api#botcommandscopechatmember
 */
class BotCommandScopeChatMember extends BotCommandScope
{
    public function __construct(
        public readonly string $type,
        public readonly int|string $chat_id,
        public readonly int $user_id,
    ) {
    }
}
