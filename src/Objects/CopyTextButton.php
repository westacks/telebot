<?php

namespace WeStacks\TeleBot\Objects;

use WeStacks\TeleBot\Contracts\TelegramObject;

/**
 * This object represents an inline keyboard button that copies specified text to the clipboard.
 *
 * @property string $text The text to be copied to the clipboard; 1-256 characters
 */
class CopyTextButton extends TelegramObject
{
    protected $attributes = [
        'text' => 'string',
    ];
}
