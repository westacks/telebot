<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object contains full information about the bot itself.
 * @property-read int $id Unique identifier for this bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
 * @property-read true $is_bot Always True
 * @property-read string $first_name Bot's first name
 * @property-read ?string $username Optional. Bot's username
 * @property-read ?string[] $active_usernames Optional. If non-empty, the list of all active usernames of the bot
 * @property-read bool $can_join_groups True, if the bot can be added to groups
 * @property-read bool $can_read_all_group_messages True, if privacy mode is disabled for the bot
 * @property-read bool $supports_guest_queries True, if the bot supports guest queries from chats it is not a member of
 * @property-read bool $supports_inline_queries True, if the bot supports inline queries
 * @property-read ?string $inline_query_placeholder Optional. Placeholder for inline queries, which is shown in the input field after the bot's username; omitted if the default placeholder is used
 * @property-read bool $needs_inline_query_location True, if the bot requests the location of the user with every inline query
 * @property-read bool $can_connect_to_business True, if the bot can be connected to a user account to manage it
 * @property-read bool $has_main_web_app True, if the bot has a main Web App
 * @property-read bool $has_topics_enabled True, if the bot has forum topic mode enabled in private chats
 * @property-read bool $allows_users_to_create_topics True, if the bot allows users to create and delete topics in private chats
 * @property-read bool $has_topic_sidebar True, if topics in private chats with the bot are shown in a sidebar
 * @property-read bool $can_manage_bots True, if other bots can be created to be controlled by the bot
 * @property-read bool $supports_join_request_queries True, if the bot supports join request queries and can be assigned to process them
 *
 * @see https://core.telegram.org/bots/api#botfullinfo
 */
class BotFullInfo extends TelegramObject
{
    public function __construct(
        public readonly int $id,
        public readonly true $is_bot,
        public readonly string $first_name,
        public readonly ?string $username,
        public readonly ?array $active_usernames,
        public readonly bool $can_join_groups,
        public readonly bool $can_read_all_group_messages,
        public readonly bool $supports_guest_queries,
        public readonly bool $supports_inline_queries,
        public readonly ?string $inline_query_placeholder,
        public readonly bool $needs_inline_query_location,
        public readonly bool $can_connect_to_business,
        public readonly bool $has_main_web_app,
        public readonly bool $has_topics_enabled,
        public readonly bool $allows_users_to_create_topics,
        public readonly bool $has_topic_sidebar,
        public readonly bool $can_manage_bots,
        public readonly bool $supports_join_request_queries,
    ) {
    }
}
