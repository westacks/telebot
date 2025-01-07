<?php

namespace WeStacks\TeleBot\Objects;

/**
 * The background is taken directly from a built-in chat theme.
 *
 * @property string $type       Type of the background, always “chat_theme”
 * @property string $theme_name Name of the chat theme, which is usually an emoji
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    protected $attributes = [
        'type' => 'string',
        'theme_name' => 'string',
    ];
}
