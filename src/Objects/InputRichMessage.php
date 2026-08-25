<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * Describes a rich message to be sent. Exactly one of the fields html, markdown, or blocks must be used.
 * @property-read ?InputRichBlock[] $blocks Optional. Content of the rich message to send described as a list of blocks
 * @property-read ?string $html Optional. Content of the rich message to send described using HTML formatting. See rich message formatting options for more details. Use media field to specify the media used in the message.
 * @property-read ?string $markdown Optional. Content of the rich message to send described using Markdown formatting. See rich message formatting options for more details. Use media field to specify the media used in the message.
 * @property-read ?InputRichMessageMedia[] $media Optional. List of media that are specified in the markdown or html fields using tg://photo?id=, tg://video?id=, tg://document?id=, and tg://audio?id= links
 * @property-read ?bool $is_rtl Optional. Pass True if the rich message must be shown right-to-left
 * @property-read ?bool $skip_entity_detection Optional. Pass True to skip automatic detection of entities (e.g., URLs, email addresses, username mentions, hashtags, cashtags, bot commands, or phone numbers) in the text
 *
 * @see https://core.telegram.org/bots/api#inputrichmessage
 */
class InputRichMessage extends TelegramObject
{
    public function __construct(
        public readonly ?array $blocks,
        public readonly ?string $html,
        public readonly ?string $markdown,
        public readonly ?array $media,
        public readonly ?bool $is_rtl,
        public readonly ?bool $skip_entity_detection,
    ) {
    }
}
