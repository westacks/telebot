<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The theme with emoji placed on a background.
 * @property-read string $type Type of the theme, always “emoji”
 * @property-read EmojiType[] $emojis The emoji; 0-6 regular or custom emoji
 * @property-read ?int $background_backdrop_id Optional. Identifier of the backdrop used as the background; omitted if the default background is used. Use getChatShareThemeBackdrops to get details about the backdrop.
 *
 * @see https://core.telegram.org/bots/api#chatsharethemeemoji
 */
class ChatShareThemeEmoji extends ChatShareTheme
{
    public function __construct(
        public readonly string $type,
        public readonly array $emojis,
        public readonly ?int $background_backdrop_id,
    ) {
    }
}
