<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a rich message to be sent. Exactly one of the fields html or markdown must be used.
 * @property-read ?string $html Optional. Content of the rich message to send described using HTML formatting. See rich message formatting options for more details.
 * @property-read ?string $markdown Optional. Content of the rich message to send described using Markdown formatting. See rich message formatting options for more details.
 * @property-read ?bool $is_rtl Optional. Pass True if the rich message must be shown right-to-left
 * @property-read ?bool $skip_entity_detection Optional. Pass True to skip automatic detection of entities (e.g., URLs, email addresses, username mentions, hashtags, cashtags, bot commands, or phone numbers) in the text
 *
 * @see https://core.telegram.org/bots/api#inputrichmessage
 */
class InputRichMessage extends TelegramObject
{
    public function __construct(
        public readonly ?string $html,
        public readonly ?string $markdown,
        public readonly ?bool $is_rtl,
        public readonly ?bool $skip_entity_detection,
    ) {
    }
}
