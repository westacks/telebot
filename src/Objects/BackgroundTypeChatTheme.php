<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is taken directly from a built-in chat theme.
 * @property-read string $type Type of the background, always “chat_theme”
 * @property-read string $theme_name Name of the chat theme, which is usually an emoji
 *
 * @see https://core.telegram.org/bots/api#backgroundtypechattheme
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    public function __construct(
        public readonly string $type,
        public readonly string $theme_name,
    ) {
    }
}
