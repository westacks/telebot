<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object represents the scope to which bot commands are applied. Currently, the following 7 scopes are supported:
 *
 * - [BotCommandScopeDefault](https://core.telegram.org/bots/api#botcommandscopedefault)
 * - [BotCommandScopeAllPrivateChats](https://core.telegram.org/bots/api#botcommandscopeallprivatechats)
 * - [BotCommandScopeAllGroupChats](https://core.telegram.org/bots/api#botcommandscopeallgroupchats)
 * - [BotCommandScopeAllChatAdministrators](https://core.telegram.org/bots/api#botcommandscopeallchatadministrators)
 * - [BotCommandScopeChat](https://core.telegram.org/bots/api#botcommandscopechat)
 * - [BotCommandScopeChatAdministrators](https://core.telegram.org/bots/api#botcommandscopechatadministrators)
 * - [BotCommandScopeChatMember](https://core.telegram.org/bots/api#botcommandscopechatmember)
 */
abstract class BotCommandScope extends TelegramObject
{
    protected static $types = [
        'default' => BotCommandScopeDefault::class,
        'all_private_chats' => BotCommandScopeAllPrivateChats::class,
        'all_group_chats' => BotCommandScopeAllGroupChats::class,
        'all_chat_administrators' => BotCommandScopeAllChatAdministrators::class,
        'chat' => BotCommandScopeChat::class,
        'chat_administrators' => BotCommandScopeChatAdministrators::class,
        'chat_member' => BotCommandScopeChatMember::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['type'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
