<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a chat background.
 *
 * @property BackgroundTypeFill|BackgroundTypeWallpaper|BackgroundTypePattern|BackgroundTypeChatTheme $type Type of the background
 */
class ChatBackground extends TelegramObject
{
    protected $attributes = [
        'type' => 'BackgroundType',
    ];
}
