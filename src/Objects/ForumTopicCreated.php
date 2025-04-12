<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about a new forum topic created in the chat.
 * @property-read string $name Name of the topic
 * @property-read int $icon_color Color of the topic icon in RGB format
 * @property-read ?string $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
 *
 * @see https://core.telegram.org/bots/api#forumtopiccreated
 */
class ForumTopicCreated extends TelegramObject
{
    public function __construct(
        public readonly string $name,
        public readonly int $icon_color,
        public readonly ?string $icon_custom_emoji_id,
    ) {
    }
}
