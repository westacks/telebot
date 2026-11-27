<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to change the settings of the bot. Settings that aren't specified remain unchanged. Returns True on success.
 *
 * @property-read ?bool $supports_inline_queries Pass True to enable inline mode for the bot or False to disable it
 * @property-read ?string $inline_query_placeholder New placeholder for inline queries, which is shown in the input field after the bot's username. Pass an empty string to use the default placeholder.
 * @property-read ?bool $needs_inline_query_location Pass True to request the location of the user with every inline query to the bot or False to stop requesting it
 * @property-read ?int $inline_feedback_share_denominator Denominator of the share of chosen inline results received by the bot; the bot receives 1 out of inline_feedback_share_denominator chosen results. Must be one of 1, 10, 100, or 1000. Pass 0 to stop receiving chosen inline results.
 * @property-read ?bool $can_join_groups Pass True to allow adding the bot to groups or False to disallow it
 * @property-read ?bool $can_read_all_group_messages Pass True to disable privacy mode for the bot or False to enable it
 * @property-read ?bool $can_connect_to_business Pass True to allow connecting the bot to user accounts to manage them or False to disallow it
 * @property-read ?bool $can_manage_bots Pass True to allow creating other bots that will be controlled by the bot or False to disallow it
 * @property-read ?bool $supports_guest_queries Pass True to allow guest queries to the bot from chats it isn't a member of or False to disallow them
 * @property-read ?bool $supports_join_request_queries Pass True to allow assigning the bot to process join request queries or False to disallow it
 * @property-read ?bool $has_topics_enabled Pass True to enable forum topic mode in private chats with the bot or False to disable it
 * @property-read ?bool $allows_users_to_create_topics Pass True to allow users to create and delete topics in private chats with the bot or False to disallow it
 * @property-read ?bool $has_topic_sidebar Pass True to show topics in private chats with the bot in a sidebar or False to stop showing them in a sidebar
 * @property-read ?bool $can_communicate_with_bots Pass True to allow the bot to communicate with other bots in groups, private chats, and through business accounts or False to disallow it
 * @property-read ?string $callback_query_mode Mode in which the bot receives callback queries from buttons in messages sent by the bot. Must be one of “default” (the field message is always used and contains an InaccessibleMessage if the message is inaccessible to the bot), “auto” (the field inline_message_id is used instead of the field message if the message is inaccessible to the bot; the field message can still contain an inaccessible message if the message has just been deleted), or “inline” (the field inline_message_id is always used instead of the field message).
 *
 * @see https://core.telegram.org/bots/api#setmysettings
 */
class SetMySettingsMethod extends TelegramMethod
{
    protected string $method = 'setMySettings';
    protected array $expect = ['true'];

    public function __construct(
        public readonly ?bool $supports_inline_queries,
        public readonly ?string $inline_query_placeholder,
        public readonly ?bool $needs_inline_query_location,
        public readonly ?int $inline_feedback_share_denominator,
        public readonly ?bool $can_join_groups,
        public readonly ?bool $can_read_all_group_messages,
        public readonly ?bool $can_connect_to_business,
        public readonly ?bool $can_manage_bots,
        public readonly ?bool $supports_guest_queries,
        public readonly ?bool $supports_join_request_queries,
        public readonly ?bool $has_topics_enabled,
        public readonly ?bool $allows_users_to_create_topics,
        public readonly ?bool $has_topic_sidebar,
        public readonly ?bool $can_communicate_with_bots,
        public readonly ?string $callback_query_mode,
    ) {
    }
}
