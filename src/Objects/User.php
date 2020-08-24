<?php

namespace WeStacks\TeleBot\Objects;

/**
 * This object represents a Telegram user or bot.
 * 
 * @property Integer                $id                                 Unique identifier for this user or bot
 * @property Boolean                $is_bot                             True, if this user is a bot
 * @property String	                $first_name                         User's or bot's first name
 * @property String	                $last_name                          `Optional` User's or bot's last name
 * @property String                 $username                           `Optional` User's or bot's username
 * @property String                 $language_code                      `Optional` IETF language tag of the user's language
 * @property Boolean                $can_join_groups                    `Optional` True, if the bot can be invited to groups. Returned only in getMe.
 * @property Boolean                $can_read_all_group_messages        `Optional` True, if privacy mode is disabled for the bot. Returned only in getMe.
 * @property Boolean                $supports_inline_queries            `Optional` True, if the bot supports inline queries. Returned only in getMe.
 * 
 * @package WeStacks\TeleBot\Objects
 */
class User extends TelegramObject
{
    protected function propertiesMap() {
        return [
            'id'                            => 'integer',
            'is_bot'                        => 'boolean',
            'first_name'                    => 'string',
            'last_name'                     => 'string',
            'username'                      => 'string',
            'language_code'                 => 'string',
            'can_join_groups'               => 'boolean',
            'can_read_all_group_messages'   => 'boolean',
            'supports_inline_queries'       => 'boolean'
        ];
    }
}