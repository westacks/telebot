<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents a service message about an edited forum topic.
 * @property-read ?string $name Optional. New name of the topic, if it was edited
 * @property-read ?string $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
 *
 * @see https://core.telegram.org/bots/api#forumtopicedited
 */
class ForumTopicEdited extends TelegramObject
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $icon_custom_emoji_id,
    ) {
    }
}
