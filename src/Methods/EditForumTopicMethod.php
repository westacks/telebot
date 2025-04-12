<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read int $message_thread_id Unique identifier for the target message thread of the forum topic
 * @property-read ?string $name New topic name, 0-128 characters. If not specified or empty, the current name of the topic will be kept
 * @property-read ?string $icon_custom_emoji_id New unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers. Pass an empty string to remove the icon. If not specified, the current icon will be kept
 *
 * @see https://core.telegram.org/bots/api#editforumtopic
 */
class EditForumTopicMethod extends TelegramMethod
{
    protected string $method = 'editForumTopic';
    protected array $expect = ['true'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly int $message_thread_id,
        public readonly ?string $name,
        public readonly ?string $icon_custom_emoji_id,
    ) {
    }
}
