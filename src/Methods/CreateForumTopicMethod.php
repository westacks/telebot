<?php

namespace WeStacks\TeleBot\Methods;

use WeStacks\TeleBot\Foundation\TelegramMethod;

/**
 * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a ForumTopic object.
 *
 * @property-read int|string $chat_id Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
 * @property-read string $name Topic name, 1-128 characters
 * @property-read ?int $icon_color Color of the topic icon in RGB format. Currently, must be one of 7322096 (0x6FB9F0), 16766590 (0xFFD67E), 13338331 (0xCB86DB), 9367192 (0x8EEE98), 16749490 (0xFF93B2), or 16478047 (0xFB6F5F)
 * @property-read ?string $icon_custom_emoji_id Unique identifier of the custom emoji shown as the topic icon. Use getForumTopicIconStickers to get all allowed custom emoji identifiers.
 *
 * @see https://core.telegram.org/bots/api#createforumtopic
 */
class CreateForumTopicMethod extends TelegramMethod
{
    protected string $method = 'createForumTopic';
    protected array $expect = ['ForumTopic'];

    public function __construct(
        public readonly int|string $chat_id,
        public readonly string $name,
        public readonly ?int $icon_color,
        public readonly ?string $icon_custom_emoji_id,
    ) {
    }
}
