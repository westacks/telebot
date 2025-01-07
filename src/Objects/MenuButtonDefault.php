<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Describes that no specific value for the menu button was set.
 *
 * @property string $type Type of the button, must be default
 */
class MenuButtonDefault extends MenuButton
{
    protected $attributes = [
        'type' => 'string',
    ];
}
