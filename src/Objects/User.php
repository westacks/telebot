<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a Telegram user or bot.
 * @property-read int $id Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type is safe for storing this identifier.
 * @property-read bool $is_bot True, if this user is a bot
 * @property-read string $first_name User's or bot's first name
 * @property-read ?string $last_name Optional. User's or bot's last name
 * @property-read ?string $username Optional. User's or bot's username
 * @property-read ?string $language_code Optional. IETF language tag of the user's language
 * @property-read ?true $is_premium Optional. True, if this user is a Telegram Premium user
 * @property-read ?true $added_to_attachment_menu Optional. True, if this user added the bot to the attachment menu
 *
 * @see https://core.telegram.org/bots/api#user
 */
class User extends TelegramObject
{
    public ?bool $can_join_groups = null;
    public ?bool $can_read_all_group_messages = null;
    public ?bool $supports_guest_queries = null;
    public ?bool $supports_inline_queries = null;
    public ?bool $can_connect_to_business = null;
    public ?bool $has_main_web_app = null;
    public ?bool $has_topics_enabled = null;
    public ?bool $allows_users_to_create_topics = null;
    public ?bool $can_manage_bots = null;
    public ?bool $supports_join_request_queries = null;

    public function __construct(
        public readonly int $id,
        public readonly bool $is_bot,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $username,
        public readonly ?string $language_code,
        public readonly ?true $is_premium,
        public readonly ?true $added_to_attachment_menu,
    ) {
    }
}
