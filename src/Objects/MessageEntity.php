<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 * @property-read string $type Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag or #hashtag@chatusername), “cashtag” ($USD or $USD@chatusername), “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “blockquote” (block quotation), “expandable_blockquote” (collapsed-by-default block quotation), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers), or “date_time” (for formatted date and time)
 * @property-read int $offset Offset in UTF-16 code units to the start of the entity
 * @property-read int $length Length of the entity in UTF-16 code units
 * @property-read ?string $url Optional. For “text_link” only, URL that will be opened after user taps on the text
 * @property-read ?User $user Optional. For “text_mention” only, the mentioned user
 * @property-read ?string $language Optional. For “pre” only, the programming language of the entity text
 * @property-read ?string $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
 * @property-read ?int $unix_time Optional. For “date_time” only, the Unix time associated with the entity
 * @property-read ?string $date_time_format Optional. For “date_time” only, the string that defines the formatting of the date and time. See date-time entity formatting for more details.
 *
 * @see https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity extends TelegramObject
{
    public function __construct(
        public readonly string $type,
        public readonly int $offset,
        public readonly int $length,
        public readonly ?string $url,
        public readonly ?User $user,
        public readonly ?string $language,
        public readonly ?string $custom_emoji_id,
        public readonly ?int $unix_time,
        public readonly ?string $date_time_format,
    ) {
    }
}
