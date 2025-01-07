<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a Telegram user or bot.
 *
 * @property int    $id                          Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property bool   $is_bot                      True, if this user is a bot
 * @property string $first_name                  User's or bot's first name
 * @property string $last_name                   Optional. User's or bot's last name
 * @property string $username                    Optional. User's or bot's username
 * @property string $language_code               Optional. [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) of the user's language
 * @property bool   $is_premium                  Optional. True, if this user is a Telegram Premium user
 * @property bool   $added_to_attachment_menu    Optional. True, if this user added the bot to the attachment menu
 * @property bool   $can_join_groups             Optional. True, if the bot can be invited to groups. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property bool   $can_read_all_group_messages Optional. True, if [privacy mode](https://core.telegram.org/bots/features#privacy-mode) is disabled for the bot. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property bool   $supports_inline_queries     Optional. True, if the bot supports inline queries. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property bool   $can_connect_to_business     Optional. True, if the bot can be connected to a Telegram Business account to receive its messages. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 * @property bool   $has_main_web_app            Optional. True, if the bot has a main Web App. Returned only in [getMe](https://core.telegram.org/bots/api#getme).
 */
class User extends TelegramObject
{
    protected $attributes = [
        'id' => 'integer',
        'is_bot' => 'boolean',
        'first_name' => 'string',
        'last_name' => 'string',
        'username' => 'string',
        'language_code' => 'string',
        'is_premium' => 'boolean',
        'added_to_attachment_menu' => 'boolean',
        'can_join_groups' => 'boolean',
        'can_read_all_group_messages' => 'boolean',
        'supports_inline_queries' => 'boolean',
        'can_connect_to_business' => 'boolean',
        'has_main_web_app' => 'boolean',
    ];
}
