<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\Identifiable;
use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains information about one member of a chat. Currently, the following 6 types of chat members are supported:
 * - [ChatMemberOwner](https://core.telegram.org/bots/api#chatmemberowner)
 * - [ChatMemberAdministrator](https://core.telegram.org/bots/api#chatmemberadministrator)
 * - [ChatMemberMember](https://core.telegram.org/bots/api#chatmembermember)
 * - [ChatMemberRestricted](https://core.telegram.org/bots/api#chatmemberrestricted)
 * - [ChatMemberLeft](https://core.telegram.org/bots/api#chatmemberleft)
 * - [ChatMemberBanned](https://core.telegram.org/bots/api#chatmemberbanned)
 *
 * @see https://core.telegram.org/bots/api#chatmember
 */
abstract class ChatMember extends TelegramObject implements Identifiable
{
    public static function identify(array $parameters): string
    {
        return match ($parameters['status']) {
            'creator' => ChatMemberOwner::class,
            'administrator' => ChatMemberAdministrator::class,
            'member' => ChatMemberMember::class,
            'restricted' => ChatMemberRestricted::class,
            'left' => ChatMemberLeft::class,
            'kicked' => ChatMemberBanned::class,
            default => throw new \InvalidArgumentException("Unknown ChatMember: ".$parameters['status']),
        };
    }
}
