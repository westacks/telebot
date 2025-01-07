<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents a chat background.
 *
 * @property BackgroundTypeChatTheme|BackgroundTypeFill|BackgroundTypePattern|BackgroundTypeWallpaper $type Type of the background
 */
class ChatBackground extends TelegramObject
{
    protected $attributes = [
        'type' => 'BackgroundType',
    ];
}
