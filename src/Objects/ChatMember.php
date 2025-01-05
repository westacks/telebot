<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;
use WeStacks\TeleBot\Exceptions\TeleBotException;

/**
 * This object contains information about one member of a chat. Currently, the following 6 types of chat members are supported:
 *
 * - [ChatMemberOwner](https://core.telegram.org/bots/api#chatmemberowner)
 * - [ChatMemberAdministrator](https://core.telegram.org/bots/api#chatmemberadministrator)
 * - [ChatMemberMember](https://core.telegram.org/bots/api#chatmembermember)
 * - [ChatMemberRestricted](https://core.telegram.org/bots/api#chatmemberrestricted)
 * - [ChatMemberLeft](https://core.telegram.org/bots/api#chatmemberleft)
 * - [ChatMemberBanned](https://core.telegram.org/bots/api#chatmemberbanned)
 */
abstract class ChatMember extends TelegramObject
{
    protected static $types = [
        'creator' => ChatMemberOwner::class,
        'administrator' => ChatMemberAdministrator::class,
        'member' => ChatMemberMember::class,
        'restricted' => ChatMemberRestricted::class,
        'left' => ChatMemberLeft::class,
        'kicked' => ChatMemberBanned::class,
    ];

    public static function create($object)
    {
        $object = (array)$object;

        if ($class = static::$types[$object['status'] ?? null] ?? null) {
            return new $class($object);
        }

        throw new TeleBotException('Cannot cast value of type ' . gettype($object) . ' to type ' . static::class);
    }
}
