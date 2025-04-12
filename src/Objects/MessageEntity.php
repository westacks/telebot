<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Foundation\TelegramObject;

/**
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 * @property-read string $type Type of the entity. Currently, can be “mention” (@username), “hashtag” (#hashtag or #hashtag@chatusername), “cashtag” ($USD or $USD@chatusername), “bot_command” (/start@jobs_bot), “url” (https://telegram.org), “email” (do-not-reply@telegram.org), “phone_number” (+1-212-555-0123), “bold” (bold text), “italic” (italic text), “underline” (underlined text), “strikethrough” (strikethrough text), “spoiler” (spoiler message), “blockquote” (block quotation), “expandable_blockquote” (collapsed-by-default block quotation), “code” (monowidth string), “pre” (monowidth block), “text_link” (for clickable text URLs), “text_mention” (for users without usernames), “custom_emoji” (for inline custom emoji stickers)
 * @property-read int $offset Offset in UTF-16 code units to the start of the entity
 * @property-read int $length Length of the entity in UTF-16 code units
 * @property-read ?string $url Optional. For “text_link” only, URL that will be opened after user taps on the text
 * @property-read ?User $user Optional. For “text_mention” only, the mentioned user
 * @property-read ?string $language Optional. For “pre” only, the programming language of the entity text
 * @property-read ?string $custom_emoji_id Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
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
    ) {
    }
}
