<?php

namespace WeStacks\TeleBot\Objects;

/**
 * Represents a menu button, which opens the bot's list of commands.
 *
 * @property string $type Type of the button, must be commands
 */
class MenuButtonCommands extends MenuButton
{
    protected $attributes = [
        'type' => 'string',
    ];
}
