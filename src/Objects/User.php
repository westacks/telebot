<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Interfaces\TelegramObject;

/**
 * This object represents a Telegram user or bot.
 *
 * @property int    $id                          Unique identifier for this user or bot
 * @property bool   $is_bot                      True, if this user is a bot
 * @property string $first_name                  User's or bot's first name
 * @property string $last_name                   _Optional_. User's or bot's last name
 * @property string $username                    _Optional_. User's or bot's username
 * @property string $language_code               _Optional_. IETF language tag of the user's language
 * @property bool   $can_join_groups             _Optional_. True, if the bot can be invited to groups. Returned only in getMe.
 * @property bool   $can_read_all_group_messages _Optional_. True, if privacy mode is disabled for the bot. Returned only in getMe.
 * @property bool   $supports_inline_queries     _Optional_. True, if the bot supports inline queries. Returned only in getMe.
 */
class User extends TelegramObject
{
    protected function relations()
    {
        return [
            'id' => 'integer',
            'is_bot' => 'boolean',
            'first_name' => 'string',
            'last_name' => 'string',
            'username' => 'string',
            'language_code' => 'string',
            'can_join_groups' => 'boolean',
            'can_read_all_group_messages' => 'boolean',
            'supports_inline_queries' => 'boolean',
        ];
    }
}
